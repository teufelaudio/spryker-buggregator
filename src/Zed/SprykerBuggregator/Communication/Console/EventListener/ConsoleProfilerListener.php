<?php

declare(strict_types = 1);

namespace Teufelaudio\Zed\SprykerBuggregator\Communication\Console\EventListener;

use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\Console\Event\ConsoleEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Teufelaudio\Shared\SprykerBuggregator\SprykerBuggregatorConstants;
use Teufelaudio\Zed\SprykerBuggregator\Communication\SprykerBuggregatorCommunicationFactory;

/**
 * @method SprykerBuggregatorCommunicationFactory getFactory()
 */
final class ConsoleProfilerListener extends AbstractPlugin implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            ConsoleEvents::COMMAND => ['start', 4096],
            ConsoleEvents::TERMINATE => ['end', -4096],
        ];
    }

    public function start(ConsoleEvent $event): void
    {
        if (!$this->isProfilingEnabled()) {
            return;
        }

        $this->getFactory()->getBuggregatorService()->startProfiler([
            "type" => SprykerBuggregatorConstants::PROFILE_TYPE_CLI,
            "command" => $event->getCommand()->getName(),
        ]);
    }

    public function end(ConsoleEvent $event): void
    {
        if (!$this->isProfilingEnabled()) {
            return;
        }

        $this->getFactory()->getBuggregatorService()->endProfiler();
    }

    private function isProfilingEnabled(): bool
    {
        return $this->getFactory()->getConfig()->isCliProfilerEnabled();
    }
}

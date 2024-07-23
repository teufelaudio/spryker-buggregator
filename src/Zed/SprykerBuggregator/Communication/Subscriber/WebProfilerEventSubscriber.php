<?php

declare(strict_types = 1);

namespace Teufelaudio\Zed\SprykerBuggregator\Communication\Subscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\KernelEvent;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\TerminateEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Teufelaudio\Service\SprykerBuggregator\SprykerBuggregatorServiceInterface;
use Teufelaudio\Shared\SprykerBuggregator\SprykerBuggregatorConstants;

final class WebProfilerEventSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private readonly SprykerBuggregatorServiceInterface $buggregatorService,
        private readonly bool                               $isEnabled
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => ['start', 4096],
            KernelEvents::TERMINATE => ['end', -4096],
        ];
    }

    public function start(RequestEvent $event): void
    {
        if (!$this->isProfilingEnabled($event)) {
            return;
        }

        $this->buggregatorService->startProfiler([
            "type" => SprykerBuggregatorConstants::PROFILE_TYPE_WEB,
            "URL" => $event->getRequest()->getUri(),
        ]);
    }

    public function end(TerminateEvent $event): void
    {
        if (!$this->isProfilingEnabled($event)) {
            return;
        }

        $this->buggregatorService->endProfiler();
    }

    private function isProfilingEnabled(KernelEvent $event): bool
    {
        if (!$event->isMainRequest()) {
            return false;
        }

        if (!$this->isEnabled) {
            return false;
        }

        return true;
    }
}

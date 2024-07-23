<?php

declare(strict_types = 1);

namespace Teufelaudio\Yves\SprykerBuggregator;

use Spryker\Yves\Kernel\AbstractFactory;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Teufelaudio\Service\SprykerBuggregator\SprykerBuggregatorServiceInterface;
use Teufelaudio\Yves\SprykerBuggregator\Subscriber\WebProfilerEventSubscriber;

/**
 * @method SprykerBuggregatorConfig getConfig()
 */
final class SprykerBuggregatorFactory extends AbstractFactory
{
    public function createWebProfilerEventSubscriber(): EventSubscriberInterface
    {
        return new WebProfilerEventSubscriber(
            $this->getBuggregatorService(),
            $this->getConfig()->isWebProfilerEnabled()
        );
    }

    private function getBuggregatorService(): SprykerBuggregatorServiceInterface
    {
        return $this->getProvidedDependency(SprykerBuggregatorDependencyProvider::SERVICE_BUGREGATOR);
    }
}

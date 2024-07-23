<?php

declare(strict_types = 1);

namespace Teufelaudio\Zed\SprykerBuggregator\Communication;

use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Teufelaudio\Service\SprykerBuggregator\SprykerBuggregatorServiceInterface;
use Teufelaudio\Zed\SprykerBuggregator\SprykerBuggregatorConfig;
use Teufelaudio\Zed\SprykerBuggregator\SprykerBuggregatorDependencyProvider;
use Teufelaudio\Zed\SprykerBuggregator\Communication\Subscriber\WebProfilerEventSubscriber;

/**
 * @method SprykerBuggregatorConfig getConfig()
 */
final class SprykerBuggregatorCommunicationFactory extends AbstractCommunicationFactory
{
    public function getBuggregatorService(): SprykerBuggregatorServiceInterface
    {
        return $this->getProvidedDependency(SprykerBuggregatorDependencyProvider::SERVICE_BUGGREGATOR);
    }

    public function createWebProfilerEventSubscriber(): EventSubscriberInterface
    {
        return new WebProfilerEventSubscriber(
            $this->getBuggregatorService(),
            $this->getConfig()->isWebProfilerEnabled()
        );
    }
}

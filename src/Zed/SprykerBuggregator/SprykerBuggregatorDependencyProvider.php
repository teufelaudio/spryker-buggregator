<?php

declare(strict_types = 1);

namespace Teufelaudio\Zed\SprykerBuggregator;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

final class SprykerBuggregatorDependencyProvider extends AbstractBundleDependencyProvider
{
    public const SERVICE_BUGGREGATOR = 'SERVICE_BUGGREGATOR';

    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);

        $this->addBuggregatorService($container);

        return $container;
    }

    private function addBuggregatorService(Container $container): void
    {
        $container->set(static::SERVICE_BUGGREGATOR, static fn (Container $container)
            => $container->getLocator()->sprykerBuggregator()->service());
    }
}

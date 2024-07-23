<?php

declare(strict_types = 1);

namespace Teufelaudio\Yves\SprykerBuggregator;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

final class SprykerBuggregatorDependencyProvider extends AbstractBundleDependencyProvider
{
    public const SERVICE_BUGREGATOR = 'SERVICE_BUGREGATOR';

    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);

        $this->addBuggregatorService($container);

        return $container;
    }

    private function addBuggregatorService(Container $container): void
    {
        $container->set(static::SERVICE_BUGREGATOR, static fn (Container $container)
            => $container->getLocator()->sprykerBuggregator()->service());
    }
}

<?php

declare(strict_types = 1);

namespace Teufelaudio\Yves\SprykerBuggregator\Plugin\EventDispatcher;

use Spryker\Service\Container\ContainerInterface;
use Spryker\Shared\EventDispatcher\EventDispatcherInterface;
use Spryker\Shared\EventDispatcherExtension\Dependency\Plugin\EventDispatcherPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Teufelaudio\Yves\SprykerBuggregator\SprykerBuggregatorFactory;

/**
 * @method SprykerBuggregatorFactory getFactory()
 */
final class RequestProfilerEventDispatcherPlugin extends AbstractPlugin implements EventDispatcherPluginInterface
{
    public function extend(EventDispatcherInterface $eventDispatcher, ContainerInterface $container): EventDispatcherInterface
    {
        $eventDispatcher->addSubscriber($this->getFactory()->createWebProfilerEventSubscriber());

        return $eventDispatcher;
    }
}

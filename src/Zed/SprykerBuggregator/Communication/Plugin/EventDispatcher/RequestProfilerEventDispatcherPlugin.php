<?php

declare(strict_types = 1);

namespace Teufelaudio\Zed\SprykerBuggregator\Communication\Plugin\EventDispatcher;

use Spryker\Service\Container\ContainerInterface;
use Spryker\Shared\EventDispatcher\EventDispatcherInterface;
use Spryker\Shared\EventDispatcherExtension\Dependency\Plugin\EventDispatcherPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Teufelaudio\Zed\SprykerBuggregator\Communication\SprykerBuggregatorCommunicationFactory;

/**
 * @method SprykerBuggregatorCommunicationFactory getFactory()
 */
final class RequestProfilerEventDispatcherPlugin extends AbstractPlugin implements EventDispatcherPluginInterface
{
    public function extend(EventDispatcherInterface $eventDispatcher, ContainerInterface $container): EventDispatcherInterface
    {
        $eventDispatcher->addSubscriber($this->getFactory()->createWebProfilerEventSubscriber());

        return $eventDispatcher;
    }
}

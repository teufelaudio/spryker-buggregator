Spryker Buggregator
=============

Provide integration of [buggregator](https://buggregator.dev/) service with Spryker.

Installation
------------

Require the package with composer:

```
$ composer require teufelaudio/spryker-buggregator
```

Add the `Teufelaudio` namespace to the `CORE_NAMESPACES` key in your `config/Shared/config_default.php` file:

```php
$config[KernelConstants::CORE_NAMESPACES] = [
    // ...
    'Teufelaudio',
];
```

Register `RequestProfilerEventDispatcherPlugin` for Yves:

```php
<?php

namespace Pyz\Yves\EventDispatcher;

use Spryker\Yves\EventDispatcher\EventDispatcherDependencyProvider as SprykerEventDispatcherDependencyProvider;
use Teufelaudio\Yves\SprykerBuggregator\Plugin\EventDispatcher\RequestProfilerEventDispatcherPlugin;

class EventDispatcherDependencyProvider extends SprykerEventDispatcherDependencyProvider
{
    protected function getEventDispatcherPlugins(): array
    {
        return [
            // ...
            new RequestProfilerEventDispatcherPlugin(),
        ];
    }
} 
```

Register `ConsoleProfilerListener` for Zed:

```php
<?php

namespace Pyz\Zed\Console;

use Spryker\Zed\Console\ConsoleDependencyProvider as SprykerConsoleDependencyProvider;
use Teufelaudio\Zed\SprykerBuggregator\Communication\Console\EventListener\ConsoleProfilerListener;

class ConsoleDependencyProvider extends SprykerConsoleDependencyProvider
{
    public function getEventSubscriber(Container $container): array
    {
        return [
            // ...
            new ConsoleProfilerListener(),
        ];
    
    }
}
```

Register the `RequestProfilerEventDispatcherPlugin` for Zed:

```php
<?php

namespace Pyz\Zed\EventDispatcher;

use Spryker\Zed\EventDispatcher\EventDispatcherDependencyProvider as SprykerEventDispatcherDependencyProvider;
use Teufelaudio\Zed\SprykerBuggregator\Communication\Plugin\EventDispatcher\RequestProfilerEventDispatcherPlugin;

class EventDispatcherDependencyProvider extends SprykerEventDispatcherDependencyProvider
{
    protected function getEventDispatcherPlugins(): array
    {
        return [
            // ...
            new RequestProfilerEventDispatcherPlugin(),
        ];
    }
}
```

Add following configuration to your `config_default-development.php`:

```php
use Teufelaudio\Shared\SprykerBuggregator\SprykerBuggregatorConstants;

// ---------- Buggregator
$config[SprykerBuggregatorConstants::SERVICE_BUGGREGATOR_ENABLED] = true;
$config[SprykerBuggregatorConstants::WEB_PROFILER_ENABLED] = true;
$config[SprykerBuggregatorConstants::CLI_PROFILER_ENABLED] = true;
$config[SprykerBuggregatorConstants::PROFILER_ENDPOINT] = '<buggregator-service-host>:8000';
```

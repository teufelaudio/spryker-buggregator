<?php

declare(strict_types=1);

namespace Teufelaudio\Service\SprykerBuggregator;

use LogicException;
use SpiralPackages\Profiler\Driver\DriverInterface;
use SpiralPackages\Profiler\DriverFactory;
use SpiralPackages\Profiler\Profiler;
use SpiralPackages\Profiler\Storage\StorageInterface;
use SpiralPackages\Profiler\Storage\WebStorage;
use Spryker\Service\Kernel\AbstractServiceFactory;
use Symfony\Component\HttpClient\NativeHttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @method SprykerBuggregatorConfig getConfig()
 */
final class SprykerBuggregatorServiceFactory extends AbstractServiceFactory
{
    private static Profiler $profiler;

    public function getProfiler(array $tags): Profiler
    {
        if (!extension_loaded('xhprof')) {
            throw new LogicException('PHP extension "xhprof" is required.');
        }

        if (!isset(self::$profiler)) {
            self::$profiler = $this->createProfiler($tags);
        }

        return self::$profiler;
    }

    private function createProfiler(array $tags): Profiler
    {
        return new Profiler(
            $this->createProfilerStorage(),
            $this->getProfilerDriver(),
            $this->getConfig()->getApplicationName(),
            $tags
        );
    }

    private function createProfilerStorage(): StorageInterface
    {
        return new WebStorage(
            $this->createHttpClient(),
            sprintf('http://%s/api/profiler/store', $this->getConfig()->getProfilerEndpoint())
        );
    }

    private function createHttpClient(): HttpClientInterface
    {
        return new NativeHttpClient();
    }

    private function getProfilerDriver(): DriverInterface
    {
        return DriverFactory::createXhrofDriver();
    }
}

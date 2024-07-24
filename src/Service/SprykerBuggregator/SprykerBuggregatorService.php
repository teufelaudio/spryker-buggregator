<?php

declare(strict_types=1);

namespace Teufelaudio\Service\SprykerBuggregator;

use Spryker\Service\Kernel\AbstractService;

/**
 * @method SprykerBuggregatorServiceFactory getFactory()
 */
final class SprykerBuggregatorService extends AbstractService implements SprykerBuggregatorServiceInterface
{
    public function startProfiler(array $tags): void
    {
        $this->getFactory()->getProfiler($tags)->start();
    }

    public function endProfiler(): void
    {
        $this->getFactory()->getProfiler([])->end();
    }
}

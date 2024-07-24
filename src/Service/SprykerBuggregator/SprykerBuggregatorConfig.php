<?php

declare(strict_types = 1);

namespace Teufelaudio\Service\SprykerBuggregator;

use Spryker\Service\Kernel\AbstractBundleConfig;
use Teufelaudio\Shared\SprykerBuggregator\SprykerBuggregatorConstants;

final class SprykerBuggregatorConfig extends AbstractBundleConfig
{
    public function getApplicationName(): string
    {
        return APPLICATION;
    }

    public function getProfilerEndpoint(): ?string
    {
        return $this->get(SprykerBuggregatorConstants::PROFILER_ENDPOINT);
    }
}

<?php

declare(strict_types = 1);

namespace Teufelaudio\Zed\SprykerBuggregator;

use Spryker\Zed\Kernel\AbstractBundleConfig;
use Teufelaudio\Shared\SprykerBuggregator\SprykerBuggregatorConstants;

final class SprykerBuggregatorConfig extends AbstractBundleConfig
{
    public function isCliProfilerEnabled(): bool
    {
        return $this->get(SprykerBuggregatorConstants::CLI_PROFILER_ENABLED, false);
    }

    public function isWebProfilerEnabled(): bool
    {
        return $this->get(SprykerBuggregatorConstants::WEB_PROFILER_ENABLED, false);
    }
}

<?php

declare(strict_types = 1);

namespace Teufelaudio\Yves\SprykerBuggregator;

use Spryker\Yves\Kernel\AbstractBundleConfig;
use Teufelaudio\Shared\SprykerBuggregator\SprykerBuggregatorConstants;

final class SprykerBuggregatorConfig extends AbstractBundleConfig
{
    public function isWebProfilerEnabled(): bool
    {
        return $this->get(SprykerBuggregatorConstants::WEB_PROFILER_ENABLED, false);
    }
}

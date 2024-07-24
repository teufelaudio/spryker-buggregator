<?php

declare(strict_types = 1);

namespace Teufelaudio\Shared\SprykerBuggregator;

final class SprykerBuggregatorConstants
{
    public const SERVICE_BUGGREGATOR_ENABLED = 'SERVICE_BUGGREGATOR_ENABLED';

    public const CLI_PROFILER_ENABLED = 'BUGGREGATOR:CLI_PROFILER_ENABLED';
    public const WEB_PROFILER_ENABLED = 'BUGGREGATOR:WEB_PROFILER_ENABLED';

    public const PROFILER_ENDPOINT = '';

    public const PROFILE_TYPE_CLI = 'CLI';
    public const PROFILE_TYPE_WEB = 'WEB';
}

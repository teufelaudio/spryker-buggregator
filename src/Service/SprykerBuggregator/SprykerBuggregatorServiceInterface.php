<?php

declare(strict_types=1);

namespace Teufelaudio\Service\SprykerBuggregator;

interface SprykerBuggregatorServiceInterface
{
    /**
     * @param array<string,string> $tags
     */
    public function startProfiler(array $tags): void;

    public function endProfiler(): void;
}

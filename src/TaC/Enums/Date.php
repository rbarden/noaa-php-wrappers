<?php

declare(strict_types=1);

namespace Rbarden\Noaa\TaC\Enums;

class Date extends Enum
{
    /**
     * Last data point available within the last 18 minutes
     */
    public const LATEST = 'latest';

    /**
     * Data from today
     */
    public const TODAY = 'today';

    /**
     * Last 72 hours
     */
    public const RECENT = 'recent';
}

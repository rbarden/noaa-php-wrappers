<?php

declare(strict_types=1);

namespace Rbarden\Noaa\TaC\Enums;

class Date extends Enum
{
    public const LATEST = 'latest';
    public const TODAY = 'today';
    public const RECENT = 'recent';
}

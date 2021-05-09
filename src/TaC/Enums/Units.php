<?php

declare(strict_types=1);

namespace Rbarden\Noaa\TaC\Enums;

class Units extends Enum
{
    /**
     * Metric (Celsius, meters, cm/s) units
     */
    public const METRIC = 'metric';

    /**
     * English (Fahrenheit, feet, knots) units
     */
    public const ENGLISH = 'english';
}

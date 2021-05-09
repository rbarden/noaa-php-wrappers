<?php

declare(strict_types=1);

namespace Rbarden\Noaa\TaC\Enums;

class Product extends Enum
{
    public const WATER_LEVEL = 'water_level';
    public const AIR_TEMPERATURE = 'air_temperature';
    public const WATER_TEMPERATURE = 'water_temperature';
    public const WIND = 'wind';
    public const AIR_PRESSURE = 'air_pressure';
    public const AIR_GAP = 'air_gap';
    public const CONDUCTIVITY = 'conductivity';
    public const VISIBILITY = 'visibility';
    public const HUMIDITY = 'humidity';
    public const SALINITY = 'salinity';
    public const HOURLY_HEIGHT = 'hourly_height';
    public const HIGH_LOW = 'high_low';
    public const DAILY_MEAN = 'daily_mean';
    public const MONTHLY_MEAN = 'monthly_mean';
    public const ONE_MINUTE_WATER_LEVEL = 'one_minute_water_level';
    public const PREDICTIONS = 'predictions';
    public const DATUMS = 'datums';
    public const CURRENTS = 'currents';
    public const CURRENTS_PREDICTIONS = 'currents_predictions';
}

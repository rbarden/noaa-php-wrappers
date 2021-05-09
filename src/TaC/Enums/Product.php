<?php

declare(strict_types=1);

namespace Rbarden\Noaa\TaC\Enums;

class Product extends Enum
{
    /**
     * Preliminary or verified water levels, depending on availability
     */
    public const WATER_LEVEL = 'water_level';

    /**
     * Air temperature as measured at the station
     */
    public const AIR_TEMPERATURE = 'air_temperature';

    /**
     * Water temperature as measured at the station
     */
    public const WATER_TEMPERATURE = 'water_temperature';

    /**
     * Wind speed, direction, and gusts as measured at the station
     */
    public const WIND = 'wind';

    /**
     * Barometric pressure as measured at the station
     */
    public const AIR_PRESSURE = 'air_pressure';

    /**
     * Air gap (distance between a bridge and the water's surface) at the station
     */
    public const AIR_GAP = 'air_gap';

    /**
     * The water's conductivity as measured at the station
     */
    public const CONDUCTIVITY = 'conductivity';

    /**
     * Visibility from the station's visibility sensor. A measure of atmospheric clarity.
     */
    public const VISIBILITY = 'visibility';

    /**
     * Relative humidity as measured at the station
     */
    public const HUMIDITY = 'humidity';

    /**
     * Salinity and specific gravity data for the station
     */
    public const SALINITY = 'salinity';

    /**
     * Verified hourly height water level data for the station
     */
    public const HOURLY_HEIGHT = 'hourly_height';

    /**
     * Verified high/low water level data for the station
     */
    public const HIGH_LOW = 'high_low';

    /**
     * Verified daily mean water level data for the station
     */
    public const DAILY_MEAN = 'daily_mean';

    /**
     * Verified monthly mean water level data for the station
     */
    public const MONTHLY_MEAN = 'monthly_mean';

    /**
     * One minute water level data for the station
     */
    public const ONE_MINUTE_WATER_LEVEL = 'one_minute_water_level';

    /**
     * 6 minute predictions water level data for the station
     *
     * For hourly height and high/low predictions, refer to the interval section {@see Interval}
     */
    public const PREDICTIONS = 'predictions';

    /**
     * Datums data for the stations
     */
    public const DATUMS = 'datums';

    /**
     * Currents data for currents stations
     */
    public const CURRENTS = 'currents';

    /**
     * Currents predictions data for currents predictions stations
     */
    public const CURRENTS_PREDICTIONS = 'currents_predictions';
}

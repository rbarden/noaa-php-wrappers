<?php

declare(strict_types=1);

namespace Rbarden\Noaa\TaC\Enums;

class Interval extends Enum
{
    /**
     * Hourly Met data and harmonic predictions will be returned
     */
    public const H = 'h';

    /**
     * High/Low tide predictions for all stations
     */
    public const HILO = 'hilo';

    /**
     * Time series data will be returned
     */
    public const ONE = '1';

    /**
     * Time series data will be returned
     */
    public const SIX = '6';

    /**
     * Time series data will be returned
     */
    public const TWENTY = '20';

    /**
     * Time series data will be returned
     */
    public const THIRTY = '30';

    /**
     * Time series data will be returned
     */
    public const SIXTY = '60';

    /**
     * Max Slack results will be returned
     */
    public const MAX_SLACK = 'MAX_SLACK';
}

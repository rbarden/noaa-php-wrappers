<?php

declare(strict_types=1);

namespace Rbarden\Noaa\TaC\Enums;

class Interval extends Enum
{
    public const H = 'h';
    public const HILO = 'hilo';
    public const ONE = '1';
    public const SIX = '6';
    public const TWENTY = '20';
    public const THIRTY = '30';
    public const SIXTY = '60';
    public const MAX_SLACK = 'MAX_SLACK';
}

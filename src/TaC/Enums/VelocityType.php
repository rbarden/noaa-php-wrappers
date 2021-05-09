<?php

declare(strict_types=1);

namespace Rbarden\Noaa\TaC\Enums;

class VelocityType extends Enum
{
    /**
     * Return results for speed and direction
     */
    public const SPEED_DIR = 'speed_dir';

    /**
     * Return results for velocity major, mean flood direction and mean ebb direction
     */
    public const DEFAULT = 'default';
}

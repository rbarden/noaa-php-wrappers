<?php

declare(strict_types=1);

namespace Rbarden\Noaa\TaC\Enums;

class Timezone extends Enum
{
    /**
     * Greenwich Mean Time
     */
    public const GMT = 'gmt';

    /**
     * Local Standard Time
     *
     * The time local to the requested station.
     */
    public const LST = 'lst';

    /**
     * Local Standard/Local Daylight Time
     *
     * The time local to the requested station.
     */
    public const LST_LDT = 'lst_ldt';
}

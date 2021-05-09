<?php

declare(strict_types=1);

namespace Rbarden\Noaa\TaC\Enums;

class Datum extends Enum
{
    /**
     * Columbia River Datum
     */
    public const CRD = 'CRD';

    /**
     * International Great Lakes Datum
     */
    public const IGLD = 'IGLD';

    /**
     * Great Lakes Low Water Datum (Chart Datum)
     */
    public const LWD = 'LWD';

    /**
     * Mean Higher High Water
     */
    public const MHHW = 'MHHW';

    /**
     * Mean High Water
     */
    public const MHW = 'MHW';

    /**
     * Mean Tide Level
     */
    public const MTL = 'MTL';

    /**
     * Mean Sea Level
     */
    public const MSL = 'MSL';

    /**
     * Mean Low Water
     */
    public const MLW = 'MLW';

    /**
     * Mean Lower Low Water
     */
    public const MLLW = 'MLLW';

    /**
     * North American Vertical Datum
     */
    public const NAVD = 'NAVD';

    /**
     * Station Datum
     */
    public const STND = 'STND';
}

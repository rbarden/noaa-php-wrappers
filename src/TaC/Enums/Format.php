<?php

declare(strict_types=1);

namespace Rbarden\Noaa\TaC\Enums;

class Format extends Enum
{
    public const JSON = 'json';
    public const XML = 'xml';
    public const CSV = 'csv';
}

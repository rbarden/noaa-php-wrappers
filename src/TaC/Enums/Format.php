<?php

declare(strict_types=1);

namespace Rbarden\Noaa\TaC\Enums;

class Format extends Enum
{
    /**
     * Javascript Object Notation
     *
     * This format is useful for direct import to a javascript plotting library.
     * Parsers are available for other languages such as Java and Perl.
     */
    public const JSON = 'json';

    /**
     * Extensible Markup Language
     *
     * This format is an industry standard for data.
     */
    public const XML = 'xml';

    /**
     * Comma Separated Values
     *
     * This format is suitable for export to Microsoft Excel or other spreadsheet programs.
     * This is also the most easily human-readable format.
     */
    public const CSV = 'csv';
}

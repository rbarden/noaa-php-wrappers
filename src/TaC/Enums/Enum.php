<?php

declare(strict_types=1);

namespace Rbarden\Noaa\TaC\Enums;

use ReflectionClass;
use ReflectionClassConstant;

abstract class Enum
{
    public static function has(string $value): bool
    {
        return in_array(
            $value,
            array_values(
                static::list()
            ),
            true
        );
    }

    public static function list(): array
    {
        return (new ReflectionClass(static::class))->getConstants(ReflectionClassConstant::IS_PUBLIC);
    }
}

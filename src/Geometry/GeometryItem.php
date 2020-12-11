<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Geometry;

/**
 * Class GeometryItem
 *
 * @package Kuvardin\DoubleGis\Geometry
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
abstract class GeometryItem
{
    public const TYPE_POINT = 'POINT';
    public const TYPE_LINESTRING = 'LINESTRING';
    public const TYPE_MULTILINESTRING = 'MULTILINESTRING';
    public const TYPE_POLYGON = 'POLYGON';
    public const TYPE_MULTIPOLYGON = 'MULTIPOLYGON';

    /**
     * @param string $string
     * @return static
     */
    abstract public static function fromString(string $string): self;
}

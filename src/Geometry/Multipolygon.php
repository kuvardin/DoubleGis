<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Geometry;

/**
 * Class Multipolygon
 *
 * @package Kuvardin\DoubleGis\Geometry
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Multipolygon extends GeometryItem
{
    /**
     * @var string
     */
    public string $raw_value;

    /**
     * @param string $string
     * @return GeometryItem
     */
    public static function fromString(string $string): GeometryItem
    {
        $multi_polygon = new self;
        $multi_polygon->raw_value = $string;
        return $multi_polygon;
    }
}

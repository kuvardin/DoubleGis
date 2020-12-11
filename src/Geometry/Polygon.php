<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Geometry;

use Error;

/**
 * Class Polygon
 *
 * @package Kuvardin\DoubleGis\Geometry
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Polygon extends GeometryItem
{
    /**
     * @var Point[][]
     */
    public array $points = [];

    /**
     * @var string
     */
    public string $string_value;

    /**
     * @param string $string
     * @return static
     */
    public static function fromString(string $string): self
    {
        $polygon = new self;
        $polygon->string_value = $string;
        $points_sets = explode('),(', $string);
        foreach ($points_sets as $points_set) {
            $points = [];
            $points_set = trim($points_set, '()');
            $points_strings = explode(',', $points_set);
            foreach ($points_strings as $point_string) {
                $points[] = Point::fromString($point_string);
            }
            $polygon->points[] = $points;
        }

        return $polygon;
    }
}

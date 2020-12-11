<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Geometry;

use Error;

/**
 * Class LineString
 *
 * @package Kuvardin\DoubleGis\Geometry
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class LineString extends GeometryItem
{
    /**
     * @var Point[]
     */
    public array $points = [];

    /**
     * @param string $string
     * @return static
     */
    public static function fromString(string $string): self
    {
        $line_string = new self;
        $points_strings = explode(',', $string);
        foreach ($points_strings as $point_string) {
            $point_coordinates = explode(' ', $point_string);
            $line_string->points[] = new Point((float)$point_coordinates[0], (float)$point_coordinates[1]);
        }

        return $line_string;
    }
}

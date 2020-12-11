<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Geometry;

/**
 * Class MultilineString
 *
 * @package Kuvardin\DoubleGis\Geometry
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class MultilineString extends GeometryItem
{
    /**
     * @var Point[][]
     */
    public array $points;

    /**
     * @param string $string
     * @return GeometryItem
     */
    public static function fromString(string $string): GeometryItem
    {
        $multiline_string = new self;
        $string = trim($string, '()');
        $parts = explode('),(', $string);
        foreach ($parts as $part) {
            $points = [];
            $points_strings = explode(',', $part);
            foreach ($points_strings as $points_string) {
                $points[] = Point::fromString($points_string);
            }
            $multiline_string->points[] = $points;
        }

        return $multiline_string;
    }
}

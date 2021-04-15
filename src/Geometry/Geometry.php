<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Geometry;

use Error;

/**
 * Class Geometry
 *
 * @package Kuvardin\DoubleGis\Geometry
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Geometry
{
    /**
     * @var GeometryItem|null Визуальный центр геометрии объекта
     */
    public ?GeometryItem $centroid;

    /**
     * @var GeometryItem|null Геометрия области, используемой для определения попадания курсора в зону объекта
     */
    public ?GeometryItem $hover;

    /**
     * @var GeometryItem|null Геометрия для выделения объекта
     */
    public ?GeometryItem $selection;

    /**
     * @var string|null Идентификатор стиля для отображения
     */
    public ?string $style = null;

    /**
     * Geometry constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->centroid = self::getItemFromString($data['centroid']) ?? null;
        $this->hover = self::getItemFromString($data['hover']) ?? null;
        $this->selection = self::getItemFromString($data['selection']) ?? null;
        $this->style = $data['style'] ?? null;
    }

    /**
     * @param string|$string $string
     * @return GeometryItem
     */
    public static function getItemFromString(string $string): GeometryItem
    {
        if (!preg_match('|^([A-Z]+)\(([0-9\. ,()]+)\)$|', $string, $match)) {
            throw new Error("Incorrect geometry item: $string");
        }

        switch ($match[1]) {
            case GeometryItem::TYPE_POINT:
                return Point::fromString($match[2]);

            case GeometryItem::TYPE_MULTIPOLYGON:
                return Multipolygon::fromString($match[2]);

            case GeometryItem::TYPE_MULTILINESTRING:
                return MultilineString::fromString($match[2]);

            case GeometryItem::TYPE_POLYGON:
                return Polygon::fromString($match[2]);

            case GeometryItem::TYPE_LINESTRING:
                return LineString::fromString($match[2]);
        }

        echo $match[2], PHP_EOL;
        throw new Error("Unknown geometry item type: {$match[1]} with value {$match[2]}");
    }
}

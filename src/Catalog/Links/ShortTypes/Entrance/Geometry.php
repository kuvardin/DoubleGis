<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Links\ShortTypes\Entrance;

use Kuvardin\DoubleGis\Geometry\LineString;
use Kuvardin\DoubleGis\Geometry\Point;

/**
 * Class Geometry
 *
 * @package Kuvardin\DoubleGis\Catalog\Links\ShortTypes\Entrance
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Geometry
{
    /**
     * @var Point[] Точки
     */
    public array $points = [];

    /**
     * @var LineString[]|null Векторы
     */
    public ?array $vectors = [];

    /**
     * @var LineString[]|null Нормали
     */
    public ?array $normals = [];

    /**
     * Geometry constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        foreach ($data['points'] as $point_string) {
            $this->points[] = Point::fromString($point_string);
        }

        foreach ($data['vectors'] as $vector_string) {
            $this->vectors[] = LineString::fromString($vector_string);
        }

        foreach ($data['normals'] as $normal_string) {
            $this->normals[] = LineString::fromString($normal_string);
        }
    }

}

<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items\Building;

/**
 * Class Context
 *
 * @package Kuvardin\DoubleGis\Catalog\Items\Building
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Context
{
    /**
     * @var int|null Расстояние. Считается относительно переданной точки в случае передачи point и radius
     */
    public ?int $distance;

    /**
     * Context constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->distance = $data['distance'] ?? null;
    }
}

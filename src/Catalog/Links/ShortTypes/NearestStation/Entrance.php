<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Links\ShortTypes\NearestStation;

use Kuvardin\DoubleGis\Geometry\Geometry;

/**
 * Вход
 *
 * @package Kuvardin\DoubleGis\Catalog\Links\ShortTypes\NearestStation
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Entrance
{
    /**
     * @var string Описание входа
     */
    public string $name;

    /**
     * @var string|null Уникальный идентификатор входа
     */
    public ?string $id;

    /**
     * @var string|null Номер входа на станцию, если объект является входом
     */
    public ?string $entrance_display_name;

    /**
     * @var Geometry|null Геометрия входа
     */
    public ?Geometry $geometry;

    /**
     * Entrance constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->id = $data['id'] ?? null;
        $this->entrance_display_name = $data['entrance_display_name'] ?? null;
        $this->geometry = new Geometry($data['geometry']) ?? null;
    }
}

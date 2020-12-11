<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Links\ShortTypes;

use Kuvardin\DoubleGis\Catalog\Links\ShortTypes\DatabaseEntrance\ApartmentsInfo;
use Kuvardin\DoubleGis\Catalog\Links\ShortTypes\DatabaseEntrance\RelativeGeometry;
use Kuvardin\DoubleGis\Catalog\Links\ShortTypes\Entrance\Geometry;

/**
 * Class DatabaseEntrance
 *
 * @package Kuvardin\DoubleGis\Catalog\Links\ShortTypes
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class DatabaseEntrance
{
    /**
     * @var string Уникальный идентификатор входа
     */
    public string $id;

    /**
     * @var string|null Описание входа
     */
    public ?string $name;

    /**
     * @var string|null Комментарий ко входу
     */
    public ?string $comment;

    /**
     * @var string|null Номер входа
     */
    public ?string $entrance_display_name;

    /**
     * @var bool Является ли вход основным
     */
    public bool $is_primary;

    /**
     * @var bool|null Если присутствует и равен true, то вход отображается в списке входов
     */
    public ?bool $is_visible_on_map;

    /**
     * @var bool|null Отсутствуют для входов без квартир.
     * Должны полностью совпадать для входов, имеющих одинаковое название
     */
    public ?bool $is_visible_in_ui;

    /**
     * @var bool|null Если присутствует и равен true, то для этого входа на карте отображаются poi
     */
    public ?bool $has_poi;

    /**
     * @var string|null Непустое имя подъезда
     */
    public ?string $entity_name;

    /**
     * @var string|null Номер подъезда
     */
    public ?string $entity_number;

    /**
     * @var ApartmentsInfo|null Информация о квартирах в доме
     */
    public ?ApartmentsInfo $apartments_info;

    /**
     * @var Geometry Геометрия входа
     */
    public Geometry $geometry;

    /**
     * @var RelativeGeometry|null Отсутствует для входов со сложной геометрией
     */
    public ?RelativeGeometry $relative_geometry;

    /**
     * DatabaseEntrance constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'] ?? null;
        $this->comment = $data['comment'] ?? null;
        $this->entrance_display_name = $data['entrance_display_name'] ?? null;
        $this->is_primary = $data['is_primary'];
        $this->is_visible_on_map = $data['is_visible_on_map'] ?? null;
        $this->is_visible_in_ui = $data['is_visible_in_ui'] ?? null;
        $this->has_poi = $data['has_poi'] ?? null;
        $this->entity_name = $data['entity_name'] ?? null;
        $this->entity_number = $data['entity_number'] ?? null;
        $this->apartments_info = isset($data['apartments_info']) ?  new ApartmentsInfo($data['apartments_info']) : null;
        $this->geometry = new Geometry($data['geometry']);
        $this->relative_geometry = isset($data['relative_geometry'])
            ? new RelativeGeometry($data['relative_geometry'])
            : null;
    }
}

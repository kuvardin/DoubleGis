<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Links\ShortTypes;

use Kuvardin\DoubleGis\Catalog\Links\ShortTypes\Entrance\Geometry;

/**
 * Точка входа
 *
 * @package Kuvardin\DoubleGis\Catalog\Links\ShortTypes
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Entrance
{
    /**
     * @var string Уникальный идентификатор входа
     */
    public string $id;

    /**
     * @var string|null Комментарий ко входу
     */
    public ?string $comment;

    /**
     * @var bool Является ли вход основным
     */
    public bool $is_primary;

    /**
     * @var bool|null Если присутствует и равен true, то вход отображается в списке входов
     */
    public ?bool $is_visible_on_map = null;

    /**
     * @var bool|null Отсутствуют для входов без квартир.
     * Должны полностью совпадать для входов, имеющих одинаковое название
     */
    public ?bool $is_visible_in_ui;

    /**
     * @var string|null Непустое имя подъезда
     */
    public ?string $entity_name;

    /**
     * @var string|null Номер подъезда
     */
    public ?string $entity_number;

    /**
     * @var string|null Номер входа на станцию, если объект является входом
     */
    public ?string $entrance_display_name;

    /**
     * @var Geometry Геометрия входа
     */
    public Geometry $geometry;

    /**
     * Entrance constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->comment = $data['comment'] ?? null;
        $this->is_primary = $data['is_primary'];
        $this->is_visible_on_map = $data['is_visible_on_map'] ?? null;
        $this->is_visible_in_ui = $data['is_visible_in_ui'] ?? null;
        $this->entity_name = $data['entity_name'] ?? null;
        $this->entity_number = $data['entity_number'] ?? null;
        $this->entrance_display_name = $data['entrance_display_name'] ?? null;
        $this->geometry = new Geometry($data['geometry']);
    }
}

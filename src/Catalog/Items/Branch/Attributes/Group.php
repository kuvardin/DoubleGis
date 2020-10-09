<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items\Branch\Attributes;

/**
 * Class Group
 *
 * @package Kuvardin\DoubleGis\Items\Branch\Attributes
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Group
{
    /**
     * @var string|null Адрес иконки
     */
    public ?string $icon_url;

    /**
     * @var string|null Название группы дополнительных атрибутов
     */
    public ?string $name;

    /**
     * @var bool Признак того, что есть пересечение между контекстными рубриками и рубриками дополнительных
     * атрибутов этой группы
     */
    public bool $is_context;

    /**
     * @var bool Признак того, что есть пересечение между primary рубриками филиала и рубриками дополнительных
     * атрибутов этой группы
     */
    public bool $is_primary;

    /**
     * @var string[]|null Массив идентификаторов рубрик, связанных с группой дополнительных атрибутов
     */
    public ?array $rubric_ids;

    /**
     * @var Attribute[] Список допоплнительных атрибутов в данной группе
     */
    public array $attributes;

    /**
     * Group constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->icon_url = $data['icon_url'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->is_context = $data['is_context'];
        $this->is_primary = $data['is_primary'];
        $this->rubric_ids = $data['rubrics_ids'] ?? null;
        $this->attributes = array_map(static fn($attr_data) => new Attribute($attr_data), $data['attributes']);
    }
}

<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items;

use Kuvardin\DoubleGis\Catalog\AdmDivision as AdmDivisionShort;
use Kuvardin\DoubleGis\Catalog\Item;
use Kuvardin\DoubleGis\Traits\LongId;

/**
 * Class AdmDivision
 *
 * @package Kuvardin\DoubleGis\Catalog\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class AdmDivision extends Item
{
    use LongId;

    /**
     * @var string Идентификатор региона
     */
    public string $region_id;

    /**
     * @var string|null Уникальный идентификатор сегмента
     */
    public ?string $segment_id = null;

    /**
     * @var string Подтип административной единицы (AdmDivision\Types::*)
     */
    public string $subtype;

    /**
     * @var string|null Локализованное название типа населённого пункта (только для subtype = settlement)
     */
    public ?string $subtype_specification = null;

    /**
     * @var bool|null Признак того, что это главный объект в группе объектов гибрида
     */
    public ?bool $is_main_in_group = null;

    /**
     * @var string|null Название территории
     * (для использования в функционале «поделиться», для конечных точек маршрута и т. д.)
     */
    public ?string $caption = null;

    /**
     * @var string Название территории
     */
    public string $name;

    /**
     * @var string Полное название территории
     */
    public string $full_name;

    /**
     * @var string|null Описание
     */
    public ?string $description = null;

    /**
     * @var bool Если true, то проезд до объекта возможен, если false или отсутствует, то нет.
     */
    public bool $is_routing_available;

    /**
     * @var AdmDivisionShort[]|null Принадлежность к административной территории более высокого уровня
     */
    public ?array $adm_divs = null;

    /**
     * AdmDivision constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->setId($data['id']);
        $this->region_id = $data['region_id'];
        $this->segment_id = $data['segment_id'] ?? null;
        $this->subtype = $data['subtype'];
        $this->subtype_specification = $data['subtype_specification'] ?? null;
        $this->is_main_in_group = $data['is_main_in_group'] ?? null;
        $this->caption = $data['caption'] ?? null;
        $this->name = $data['name'];
        $this->full_name = $data['full_name'];
        $this->description = $data['description'] ?? null;
        $this->is_routing_available = $data['is_routing_available'];

        if (isset($data['adm_div'])) {
            $this->adm_divs = [];
            foreach ($data['adm_div'] as $adm_div_data) {
                $this->adm_divs[] = new AdmDivisionShort($adm_div_data);
            }
        }
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Item::TYPE_ADM_DIV;
    }


}

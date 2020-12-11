<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items;

use Kuvardin\DoubleGis\Catalog\AdmDivision;
use Kuvardin\DoubleGis\Geometry\Geometry;
use Kuvardin\DoubleGis\Geometry\Point;
use Kuvardin\DoubleGis\Catalog\Item;
use Kuvardin\DoubleGis\Traits\LongId;

/**
 * Class Street
 *
 * @package Kuvardin\DoubleGis\Catalog\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Street extends Item
{
    use LongId;

    /**
     * @var string Уникальный идентификатор проекта
     */
    public string $region_id;

    /**
     * @var string|null Уникальный идентификатор сегмента
     */
    public ?string $segment_id;

    /**
     * @var string Название улицы
     */
    public string $name;

    /**
     * @var string|null Название улицы
     * (для использования в функционале «поделиться», для конечных точек маршрута и т. д.)
     */
    public ?string $caption;

    /**
     * @var string Полное название улицы
     */
    public string $full_name;

    /**
     * @var bool|null Признак того, что это главный объект в группе объектов гибрида
     */
    public ?bool $is_main_in_group;

    /**
     * @var bool Если true, то проезд до объекта возможен, если false или отсутствует, то нет
     */
    public bool $is_routing_available;

    /**
     * @var AdmDivision[] Принадлежность к административной территории
     */
    public array $adm_div = [];

    // TODO: dates
    // TODO: attraction

    /**
     * @var Geometry Геометрия улицы
     */
    public Geometry $geometry;

    // TODO: statistics
    // TODO: context
    // TODO: stat
    // TODO: reviews
    // TODO: sources
    // TODO: group
    // TODO: external_content

    /**
     * @var string Текущая локаль
     */
    public string $locale;

    /**
     * @var string URL для регистрации бизнес-коннекшна просмотра профиля
     */
    public string $reg_bc_url;

    // TODO: search_attributes
    // TODO: geocoded_by

    /**
     * @var Point|null Координаты точки поиска, заданные в системе координат WGS84 в формате lon, lat
     */
    public ?Point $point = null;

    /**
     * @var string|null Алиас города, в котором находится объект
     */
    public ?string $city_alias = null;

    /**
     * Street constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->setId($data['id']);
        $this->region_id = $data['region_id'];
        $this->segment_id = $data['segment_id'] ?? null;
        $this->name = $data['name'];
        $this->caption = $data['caption'] ?? null;
        $this->full_name = $data['full_name'];
        $this->is_main_in_group = $data['is_main_in_group'] ?? null;
        $this->is_routing_available = $data['is_routing_available'];

        foreach ($data['adm_div'] as $adm_div_data) {
            $this->adm_div[] = new AdmDivision($adm_div_data);
        }

        $this->geometry = new Geometry($data['geometry']);
        $this->locale = $data['locale'];
        $this->reg_bc_url = $data['reg_bc_url'];

        if (isset($data['point'])) {
            $this->point = Point::fromArray($data['point']);
        }

        $this->city_alias = $data['city_alias'] ?? null;
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Item::TYPE_STREET;
    }
}

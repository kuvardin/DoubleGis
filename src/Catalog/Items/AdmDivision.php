<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items;

use Kuvardin\DoubleGis\Catalog\AdmDivision as AdmDivisionShort;
use Kuvardin\DoubleGis\Catalog\Flags;
use Kuvardin\DoubleGis\Catalog\Item;
use Kuvardin\DoubleGis\Catalog\Items\AdmDivision\Statistics;
use Kuvardin\DoubleGis\Catalog\Items\Building\Context;
use Kuvardin\DoubleGis\Catalog\Links\Links;
use Kuvardin\DoubleGis\Catalog\Reviews\Review;
use Kuvardin\DoubleGis\Catalog\SearchAttributes;
use Kuvardin\DoubleGis\Geometry\Geometry;
use Kuvardin\DoubleGis\Geometry\Point;
use Kuvardin\DoubleGis\Traits\LongId;

/**
 * Геообъект типа административная единица
 *
 * @package Kuvardin\DoubleGis\Catalog\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class AdmDivision extends Item
{
    /**
     * Идентификатор административной единицы
     */
    use LongId;

    /**
     * @var string|null Идентификатор региона
     */
    public ?string $region_id = null;

    /**
     * @var string|null Уникальный идентификатор сегмента 14561
     */
    public ?string $segment_id = null;

    /**
     * @var string Подтип административной единицы (AdmDivision\Types::*)
     */
    public string $subtype;

    /**
     * @var Flags|null Список признаков объекта
     */
    public ?Flags $flags = null;

    /**
     * @var Context|null
     */
    public ?Context $context = null;

    /**
     * @var string|null Алиас города, в котором находится объект
     */
    public ?string $city = null;

    /**
     * @var string|null Текущая локаль
     */
    public ?string $locale = null;

    /**
     * @var string|null Локализованное название типа населённого пункта (только для subtype = settlement)
     */
    public ?string $subtype_specification = null;

    /**
     * @var bool|null Признак того, что это главный объект в группе объектов гибрида
     */
    public ?bool $is_main_in_group = null;

    /**
     * @var string Название территории
     * (для использования в функционале «поделиться», для конечных точек маршрута и т. д.)
     */
    public string $caption;

    /**
     * @var string Название территории
     */
    public string $name;

    /**
     * @var string|null Полное название территории
     */
    public ?string $full_name = null;

    /**
     * @var string|null Описание
     */
    public ?string $description = null;

    /**
     * @var bool|null Если true, то проезд до объекта возможен, если false или отсутствует, то нет.
     */
    public ?bool $is_routing_available = null;

    /**
     * @var AdmDivisionShort[]|null Принадлежность к административной территории более высокого уровня
     */
    public ?array $adm_divs = null;

    /**
     * @var Links|null Связанные объекты
     */
    public ?Links $links = null;

    /**
     * @var Review|null Отзывы о геообъекте.
     */
    public ?Review $reviews;

    /**
     * @var Point|null Координаты точки поиска, заданные в системе координат WGS84 в формате lon, lat.
     */
    public ?Point $point = null;

    /**
     * @var SearchAttributes|null Подсказка, соответствующая запросу. Поле доступно только в методах автодополнения.
     */
    public ?SearchAttributes $search_attributes = null;

    /**
     * @var Attraction|null Описание достопримечательности.
     */
    public ?Attraction $attraction = null;

    /**
     * @var Statistics|null Сводная информация об административной единице.
     */
    public ?Statistics $statistics = null;

    /**
     * @var Geometry|null Геометрия территории
     */
    public ?Geometry $geometry = null;

    /**
     * @var array|null Идентификатор источника данных об объекте. Если отсутсвует, источник данных — 2GIS.
     */
    public ?array $sources = null;

    /**
     * @var ExternalContent[]|null Внешний контент
     */
    public ?array $external_content = null;

    /**
     * @var Dates|null Время внесения информации о филиале в БД.
     */
    public ?Dates $dates = null;

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
        $this->name = $data['name'];
        $this->caption = $data['caption'];
        $this->full_name = $data['full_name'];
        $this->description = $data['description'] ?? null;
        $this->is_routing_available = $data['is_routing_available'];
        $this->attraction = $data['attraction'] ?? null;
        $this->city = $data['city'] ?? null;
        $this->context = $data['context'] ?? null;
        $this->dates = $data['dates'] ?? null;
        $this->external_content = $data['external_content'] ?? null;
        $this->flags = $data['flags'] ?? null;
        $this->geometry = $data['geometry'] ?? null;
        $this->links = $data['links'] ?? null;
        $this->locale = $data['locale'] ?? null;
        $this->point = $data['point'] ?? null;
        $this->reviews = $data['reviews'] ?? null;
        $this->search_attributes = $data['search_attributes'] ?? null;
        $this->sources = $data['sources'] ?? null;
        $this->statistics = $data['statistics'] ?? null;
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

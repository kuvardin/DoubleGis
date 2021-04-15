<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items;

use Kuvardin\DoubleGis\Catalog\AdmDivision as AdmDivisionShort;
use Kuvardin\DoubleGis\Catalog\Dates;
use Kuvardin\DoubleGis\Catalog\ExternalContent;
use Kuvardin\DoubleGis\Catalog\Flags;
use Kuvardin\DoubleGis\Catalog\Item;
use Kuvardin\DoubleGis\Catalog\Items\AdmDivision\Statistics;
use Kuvardin\DoubleGis\Catalog\Items\Building\Context;
use Kuvardin\DoubleGis\Catalog\Links\Links;
use Kuvardin\DoubleGis\Catalog\Items\AdmDivision\Review;
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
     * @var string Подтип административной единицы (AdmDivision\Types::*)
     */
    public string $subtype;

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
     * @var string|null Идентификатор региона
     */
    public ?string $region_id;

    /**
     * @var string|null Уникальный идентификатор сегмента 14561
     */
    public ?string $segment_id;

    /**
     * @var string|null Полное название территории
     */
    public ?string $full_name;

    /**
     * @var AdmDivisionShort[]|null Принадлежность к административной территории более высокого уровня
     */
    public ?array $adm_divs;

    /**
     * @var string|null Алиас города, в котором находится объект
     */
    public ?string $city_alias;

    /**
     * @var Context|null
     */
    public ?Context $context = null;

    /**
     * @var Flags|null Список признаков объекта
     */
    public ?Flags $flags = null;

    /**
     * @var string|null Текущая локаль
     */
    public ?string $locale;

    /**
     * @var bool|null Если true, то проезд до объекта возможен, если false или отсутствует, то нет.
     */
    public ?bool $is_routing_available;

    /**
     * @var Links|null Связанные объекты
     */
    public ?Links $links;

    /**
     * @var Point|null Координаты точки поиска, заданные в системе координат WGS84 в формате lon, lat.
     */
    public ?Point $point = null;

    /**
     * @var string|null Локализованное название типа населённого пункта (только для subtype = settlement)
     */
    public ?string $subtype_specification;

    /**
     * @var string|null Описание
     */
    public ?string $description;

    /**
     * @var Review|null Отзывы о геообъекте.
     */
    public ?Review $reviews = null;

    /**
     * @var Attraction|null Описание достопримечательности.
     */
    public ?Attraction $attraction;

    /**
     * @var SearchAttributes|null Подсказка, соответствующая запросу. Поле доступно только в методах автодополнения.
     */
    public ?SearchAttributes $search_attributes;

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
    public ?array $sources;

    /**
     * @var ExternalContent[]|null Внешний контент
     */
    public ?array $external_content;

    /**
     * @var Dates|null Время внесения информации о филиале в БД.
     */
    public ?Dates $dates;

    /**
     * AdmDivision constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->setId($data['id']);
        $this->subtype = $data['subtype'];
        $this->caption = $data['caption'];
        $this->name = $data['name'];
        $this->region_id = $data['region_id'];
        $this->segment_id = $data['segment_id'] ?? null;
        $this->full_name = $data['full_name'];

        if (isset($data['adm_div'])) {
            $this->adm_divs = [];
            foreach ($data['adm_div'] as $adm_div_data) {
                $this->adm_divs[] = new AdmDivisionShort($adm_div_data);
            }
        }

        $this->city_alias = $data['city_alias'] ?? null;
        $this->context = isset($data['context']) ? new Context($data['context']) : null;
        $this->flags = isset($data['flags']) ? new Flags($data['flags']) : null;
        $this->locale = $data['locale'] ?? null;
        $this->is_routing_available = $data['is_routing_available'];
        $this->links = $data['links'] ?? null;
        $this->point = isset($data['point']) ? Point::fromArray($data['point']) : null;
        $this->subtype_specification = $data['subtype_specification'] ?? null;
        $this->description = $data['description'] ?? null;
        $this->reviews = isset($data['reviews']) ? new Review($data['reviews']) : null;
        $this->attraction = isset($data['attraction']) ? new Attraction($data['attraction']) : null;
        $this->search_attributes = $data['search_attributes'] ?? null;
        $this->statistics = isset($data['statistics']) ? new Statistics($data['statistics']) : null;
        $this->geometry = isset($data['geometry']) ? new Geometry($data['geometry']) : null;
        $this->sources = $data['sources'] ?? null;
        if (isset($data['external_content'])) {
            $this->external_content = [];
            foreach ($data['external_content'] as $external_content_data) {
                $this->external_content[] = new ExternalContent($external_content_data);
            }
        }
        $this->dates = $data['dates'] ?? null;
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Item::TYPE_ADM_DIV;
    }
}

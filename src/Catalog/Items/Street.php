<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items;

use Kuvardin\DoubleGis\Catalog\AdmDivision;
use Kuvardin\DoubleGis\Catalog\Dates;
use Kuvardin\DoubleGis\Catalog\ExternalContent;
use Kuvardin\DoubleGis\Catalog\Flags;
use Kuvardin\DoubleGis\Catalog\Items\AdmDivision\Review;
use Kuvardin\DoubleGis\Catalog\Items\AdmDivision\Statistics;
use Kuvardin\DoubleGis\Catalog\Items\Building\Attraction;
use Kuvardin\DoubleGis\Catalog\Items\Building\Context;
use Kuvardin\DoubleGis\Catalog\SearchAttributes;
use Kuvardin\DoubleGis\Geometry\Geometry;
use Kuvardin\DoubleGis\Geometry\Point;
use Kuvardin\DoubleGis\Catalog\Item;
use Kuvardin\DoubleGis\LongId;


/**
 * Class Street
 *
 * @package Kuvardin\DoubleGis\Catalog\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Street extends Item
{
    public LongId $id;

    /**
     * @var string|null Название улицы
     * (для использования в функционале «поделиться», для конечных точек маршрута и т. д.)
     */
    public ?string $caption;

    /**
     * @var string Название улицы
     */
    public string $name;

    /**
     * @var string Уникальный идентификатор проекта
     */
    public string $region_id;

    /**
     * @var string|null Уникальный идентификатор сегмента
     */
    public ?string $segment_id;

    /**
     * @var AdmDivision[]|null Принадлежность к административной территории
     */
    public ?array $adm_divs;

    /**
     * @var string|null Текущая локаль
     */
    public ?string $locale;

    /**
     * @var Attraction|null Описание достопримечательности
     */
    public ?Attraction $attraction = null;

    /**
     * @var Review|null Отзывы о геообъекте.
     */
    public ?Review $reviews;

    /**
     * @var ExternalContent[]|null Дополнительные данные филиала, такие как буклеты и фотографии
     */
    public ?array $external_content;

    /**
     * @var Context|null Динамическая информация
     */
    public ?Context $context;

    /**
     * @var Flags|null Список признаков объекта.
     */
    public ?Flags $flags;

    /**
     * @var Point|null Координаты точки поиска, заданные в системе координат WGS84 в формате lon, lat.
     */
    public ?Point $point;

    /**
     * @var bool|null Если true, то проезд до объекта возможен, если false или отсутствует, то нет
     */
    public ?bool $is_routing_available;

    /**
     * @var string[]|null Идентификатор источника данных об объекте. Если отсутсвует, источник данных — 2GIS.
     */
    public ?array $sources;

    /**
     * @var SearchAttributes|null Параметры результата поиска. Возвращается только в поисковых методах версии 3.0.
     */
    public ?SearchAttributes $search_attributes;

    /**
     * @var Geometry|null Геометрия улицы
     */
    public ?Geometry $geometry;

    /**
     * @var string|null Алиас города, в котором находится объект
     */
    public ?string $city_alias;

    /**
     * @var string|null Полное название улицы
     */
    public ?string $full_name;

    /**
     * @var Statistics|null Сводная информация об улице
     */
    public ?Statistics $statistics;

    /**
     * @var Dates|null Время внесения информации о филиале в БД.
     */
    public ?Dates $dates;

    /**
     * Street constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->id = new LongId($data['id']);
        $this->name = $data['name'];
        $this->caption = $data['caption'] ?? null;
        $this->region_id = $data['region_id'];
        $this->segment_id = $data['segment_id'] ?? null;
        $this->adm_divs = isset($data['adm_div'])
            ? array_map(static fn($adm_div_data) => new AdmDivision($adm_div_data), $data['adm_div'])
            : null;
        $this->locale = $data['locale'] ?? null;
        $this->attraction = isset($data['attraction']) ? new Attraction($data['attraction']) : null;
        $this->reviews = isset($data['reviews']) ? new Review($data['reviews']) : null;

        if (isset($data['external_content'])) {
            $this->external_content = [];
            foreach ($data['external_content'] as $external_content_data) {
                $this->external_content[] = new ExternalContent($external_content_data);
            }
        }

        $this->context = isset($data['context']) ? new Context($data['context']) : null;
        $this->flags = isset($data['flags']) ? new Flags($data['flags']) :null;
        $this->point = (isset($data['point'])) ? Point::fromArray($data['point']) : null;
        $this->is_routing_available = $data['is_routing_available'] ?? null;
        $this->sources = $data['sources'] ?? null;
        $this->search_attributes = isset($data['search_attributes']) ? new SearchAttributes($data['search_attributes']): null;
        $this->geometry = isset($data['geometry']) ? new Geometry($data['geometry']) : null;
        $this->city_alias = $data['city_alias'] ?? null;
        $this->full_name = $data['full_name'] ?? null;
        $this->statistics = isset($data['statistics']) ? new Statistics($data['statistics']) : null;
        $this->dates = isset($data['dates']) ? new Dates($data['dates']) : null;
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Item::TYPE_STREET;
    }
}

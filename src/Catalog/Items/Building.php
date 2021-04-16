<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items;

use Kuvardin\DoubleGis\Catalog\Address\Address;
use Kuvardin\DoubleGis\Catalog\AdmDivision;
use Kuvardin\DoubleGis\Catalog\Dates;
use Kuvardin\DoubleGis\Catalog\ExternalContent;
use Kuvardin\DoubleGis\Catalog\Flags;
use Kuvardin\DoubleGis\Catalog\Groups\Group;
use Kuvardin\DoubleGis\Catalog\Item;
use Kuvardin\DoubleGis\Catalog\Items\AdmDivision\Review;
use Kuvardin\DoubleGis\Catalog\Items\Building\Attraction;
use Kuvardin\DoubleGis\Catalog\Items\Building\Context;
use Kuvardin\DoubleGis\Catalog\Items\Building\Floors\Floors;
use Kuvardin\DoubleGis\Catalog\Items\Building\Floors\Plans;
use Kuvardin\DoubleGis\Catalog\Items\Building\StructureInfo;
use Kuvardin\DoubleGis\Catalog\Links\Links;
use Kuvardin\DoubleGis\Catalog\SearchAttributes;
use Kuvardin\DoubleGis\Geometry\Geometry;
use Kuvardin\DoubleGis\Geometry\Point;
use Kuvardin\DoubleGis\Traits\LongId;

/**
 * Геообъект типа здание
 *
 * @package Kuvardin\DoubleGis\Catalog\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Building extends Item
{
    use LongId;

    /**
     * @var string|null Название дома
     * (для использования в функционале «поделиться», для конечных точек маршрута и т. д.).
     */
    public ?string $caption;

    /**
     * @var string Описание назначения здания
     */
    public string $purpose_name;

    /**
     * @var string|null Идентификатор региона
     */
    public ?string $region_id;

    /**
     * @var string|null Уникальный идентификатор сегмента
     */
    public ?string $segment_id;

    /**
     * @var string[]|null Идентификатор источника данных об объекте. Если отсутсвует, источник данных — 2GIS.
     */
    public ?array $sources;

    /**
     * @var string|null Представление адреса в виде одной строки с указанием города
     */
    public ?string $full_address_name;

    /**
     * @var SearchAttributes|null Параметры результата поиска. Возвращается только в поисковых методах версии 3.0.
     */
    public ?SearchAttributes $search_attributes;

    /**
     * @var StructureInfo|null
     */
    public ?StructureInfo $structure_info;

    /**
     * @var string|null Item provider
     */
    public ?string $item_provider;

    /**
     * @var Point|null Координаты точки поиска, заданные в системе координат WGS84 в формате lon, lat.
     */
    public ?Point $point;

    /**
     * @var Context|null Динамическая информация
     */
    public ?Context $context;

    /**
     * @var Address|null Адрес дома
     */
    public ?Address $address;

    /**
     * @var int|null Количество организаций в здании, на которые можно написать отзыв на flamp.ru
     */
    public ?int $allowed_for_reviews_count;

    /**
     * @var string|null Текущая локаль
     */
    public ?string $locale;

    /**
     * @var Dates|null Время внесения информации о филиале в БД.
     */
    public ?Dates $dates;

    /**
     * @var string|null Название дома
     */
    public ?string $name;

    /**
     * @var string|null Собственное имя здания
     */
    public ?string $building_name;

    /**
     * @var Review|null Отзывы о геообъекте.
     */
    public ?Review $reviews;

    /**
     * @var bool|null Если true, то проезд до объекта возможен, если false или отсутствует, то нет
     */
    public ?bool $is_routing_available;

    /**
     * @var Links|null
     */
    public ?Links $links;

    /**
     * @var AdmDivision[]|null Принадлежность к административной территории
     */
    public ?array $adm_divs;

    /**
     * @var Geometry|null Геометрия здания
     */
    public ?Geometry $geometry;

    /**
     * @var string|null Полное название дома
     */
    public ?string $full_name;

    /**
     * @var Plans|null Информация об этажах здания
     */
    public ?Plans $floor_plans;

    /**
     * @var string|null Представление поля address в виде одной строки
     */
    public ?string $address_name;

    /**
     * @var Floors|null Количество этажей
     */
    public ?Floors $floors;

    /**
     * @var string|null Алиас города, в котором находится объект
     */
    public ?string $city_alias;

    /**
     * @var Flags|null Список признаков объекта.
     */
    public ?Flags $flags;

    /**
     * @var Attraction|null Описание достопримечательности
     */
    public ?Attraction $attraction = null;

    /**
     * @var ExternalContent[]|null Дополнительные данные филиала, такие как буклеты и фотографии
     */
    public ?array $external_content;

    /**
     * Building constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->setId($data['id']);
        $this->caption = $data['caption'];
        $this->purpose_name = $data['purpose_name'];
        $this->region_id = $data['region_id'] ?? null;
        $this->segment_id = $data['segment_id'] ?? null;
        $this->sources = $data['sources'] ?? null;
        $this->full_address_name = $data['full_address_name'] ?? null;
        $this->search_attributes = isset($data['search_attributes']) ? new SearchAttributes($data['search_attributes']): null;
        $this->structure_info = isset($data['structure_info']) ? new StructureInfo($data['structure_info']) : null;
        $this->item_provider = $data['item_provider'] ?? null;
        $this->point = (isset($data['point'])) ? Point::fromArray($data['point']) : null;
        $this->context = isset($data['context']) ? new Context($data['context']) : null;
        $this->address = isset($data['address']) ? new Address($data['address']) : null;        $this->name = $data['name'];
        $this->allowed_for_reviews_count = $data['allowed_for_reviews_count'] ?? null;
        $this->locale = $data['locale'] ?? null;
        $this->dates = isset($data['dates']) ? new Dates($data['dates']) : null;
        $this->name = $data['name'] ?? null;
        $this->building_name = $data['building_name'] ?? null;
        $this->reviews = isset($data['reviews']) ? new Review($data['reviews']) : null;
        $this->is_routing_available = $data['is_routing_available'];
        $this->links = isset($data['links']) ? new Links($data['links']) : null;
        $this->adm_divs = isset($data['adm_div'])
            ? array_map(static fn($adm_div_data) => new AdmDivision($adm_div_data), $data['adm_div'])
            : null;
        $this->geometry = isset($data['geometry']) ? new Geometry($data['geometry']) : null;
        $this->full_name = $data['full_name'] ?? null;
        $this->floor_plans = isset($data['floor_plans']) ? new Plans($data['floor_plans']) : null;
        $this->address_name = $data['address_name'] ?? null;
        $this->floors = isset($data['floors']) ? new Floors($data['floors']) : null;
        $this->city_alias = $data['city_alias'] ?? null;
        $this->flags = isset($data['flags']) ? new Flags($data['flags']) :null;
        $this->attraction = isset($data['attraction']) ? new Attraction($data['attraction']) : null;

        if (isset($data['external_content'])) {
            $this->external_content = [];
            foreach ($data['external_content'] as $external_content_data) {
                $this->external_content[] = new ExternalContent($external_content_data);
            }
        }
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Item::TYPE_BUILDING;
    }
}

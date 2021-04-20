<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items;

use Error;
use Kuvardin\DoubleGis\Catalog\Address\Address;
use Kuvardin\DoubleGis\Catalog\AdmDivision;
use Kuvardin\DoubleGis\Catalog\Contacts\Group as ContactsGroup;
use Kuvardin\DoubleGis\Catalog\Dates;
use Kuvardin\DoubleGis\Catalog\ExternalContent;
use Kuvardin\DoubleGis\Catalog\Flags;
use Kuvardin\DoubleGis\Catalog\Items\Branch\Attributes\Group as AttributesGroup;
use Kuvardin\DoubleGis\Catalog\Items\Branch\Context;
use Kuvardin\DoubleGis\Catalog\Items\Branch\NameExtended;
use Kuvardin\DoubleGis\Catalog\Items\Branch\OrderWithCart;
use Kuvardin\DoubleGis\Catalog\Items\Branch\ReplyRate;
use Kuvardin\DoubleGis\Catalog\Items\Branch\Review;
use Kuvardin\DoubleGis\Catalog\Items\Branch\StopFactor;
use Kuvardin\DoubleGis\Catalog\Items\Branch\TradeLicense;
use Kuvardin\DoubleGis\Catalog\Items\Building\Floors\Floors;
use Kuvardin\DoubleGis\Catalog\Items\Building\StructureInfo;
use Kuvardin\DoubleGis\Catalog\Links\Links;
use Kuvardin\DoubleGis\Catalog\Organization;
use Kuvardin\DoubleGis\Catalog\Rubrics\Rubric;
use Kuvardin\DoubleGis\Catalog\Item;
use Kuvardin\DoubleGis\Catalog\Schedule\Schedule;
use Kuvardin\DoubleGis\Catalog\SearchAttributes;
use Kuvardin\DoubleGis\Geometry\Geometry;
use Kuvardin\DoubleGis\Geometry\Point;
use Kuvardin\DoubleGis\LongId;

/**
 * Филиал
 *
 * @package Kuvardin\DoubleGis\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Branch extends Item
{
    public LongId $id;

    /**
     * @var NameExtended Составные части наименования организации
     */
    public NameExtended $name_extended;

    /**
     * @var Organization Описание свойств организации
     */
    public Organization $org;

    /**
     * @var string Текущая локаль для региона
     */
    public string $locale;

    /**
     * @var Rubric[] Рубрики филиала
     */
    public array $rubrics;

    /**
     * @var string|null Уникальный идентификатор проекта
     */
    public ?string $region_id;

    /**
     * @var string|null Уникальный идентификатор сегмента
     */
    public ?string $segment_id;

    /**
     * @var string|null Собственное имя здания.
     */
    public ?string $building_name;

    /**
     * @var bool|null Признак наличия информации о квартирах в здании
     */
    public ?bool $has_apartments_info;

    /**
     * @var ExternalContent[]|null Внешний контент
     */
    public ?array $external_content;

    /**
     * @var StructureInfo|null Данные о количестве квартир и материале здания. Поле доступно только в коммерческом API.
     */
    public ?StructureInfo $structure_info;

    /**
     * @var string|null Индивидуальный номер налогоплательщика. Поле доступно только в коммерческом API
     */
    public ?string $itin;

    /**
     * @var Schedule|null Расписание работы филиала
     */
    public ?Schedule $schedule;

    /**
     * @var SearchAttributes|null Параметры результата поиска. Возвращается только в поисковых методах версии 3.0.
     */
    public ?SearchAttributes $search_attributes;

    /**
     * @var Floors|null Количество этажей в здании.
     */
    public ?Floors $floors;

    /**
     * @var string|mixed|null Псевдоним названия организации.
     */
    public ?string $alias;

    /**
     * @var AdmDivision[]|null Принадлежность к административной территории
     */
    public ?array $adm_divs;

    /**
     * @var Context|null Динамические свойства филиала.
     */
    public ?Context $context;

    /**
     * @var string|null Уточнение о местоположении филиала по указанному адресу
     */
    public ?string $address_comment;

    /**
     * @var Geometry|null Геометрия
     */
    public ?Geometry $geometry;

    /**
     * @var Dates|null Время внесения информации о филиале в БД.
     */
    public ?Dates $dates;

    /**
     * @var bool|null Если true, то проезд до объекта возможен, если false или отсутствует, то нет
     */
    public ?bool $is_routing_available;

    /**
     * @var Review|null Отзывы о филиале.
     */
    public ?Review $reviews;

    /**
     * @var ContactsGroup[]|null Контакты филиала
     */
    public ?array $contact_groups;

    /**
     * @var string|null Описание назначения здания.
     */
    public ?string $purpose_name;

    /**
     * @var ReplyRate[]|null
     */
    public ?array $reply_rate;

    /**
     * @var string|null Представление поля address в виде одной строки
     */
    public ?string $address_name;

    /**
     * @var Address|null Адрес, по которому располагается филиал организации
     */
    public ?Address $address;

    /**
     * @var string|null Полное название дома
     */
    public ?string $full_name;

    /**
     * @var StopFactor[]|null Набор блокирующих атрибутов, соответствующих запросу.
     */
    public ?array $stop_factors;

    /**
     * @var Links|null Связанные объекты.
     */
    public ?Links $links;

    /**
     * @var OrderWithCart[]|null Объект, описывающий свойства заказа у организации без доставки, но с корзиной
     */
    public ?array $order_with_cart;

    /**
     * @var bool|null Признак удаленного объекта
     */
    public ?bool $is_deleted;

    /**
     * @var Point|null Координаты точки поиска, заданные в системе координат WGS84 в формате lon, lat
     */
    public ?Point $point;

    /**
     * @var string|null Алиас города, в котором находится объект
     */
    public ?string $city_alias;

    /**
     * @var string|mixed|null Полное собственное название филиала или название организации.
     */
    public ?string $name;

    /**
     * @var Branch\Attributes\Group[]|null Дополнительные атрибуты филиала
     */
    public ?array $attribute_groups;

    /**
     * @var Flags|null Список признаков объекта.
     */
    public ?Flags $flags;

    /**
     * @var int|null Смещение таймзоны в минутах относительно UTC0.
     */
    public ?int $timezone_offset;

    /**
     * @var string|null Представление адреса в виде одной строки с указанием города
     */
    public ?string $full_address_name;

    /**
     * @var Branch\Delivery|null Объект, описывающий свойства доставки организации
     */
    public ?Branch\Delivery $delivery;

    /**
     * @var string|null Описание
     */
    public ?string $description;

    /**
     * @var TradeLicense|null Лицензия филиала. Поле доступно только в коммерческом API.
     */
    public ?TradeLicense $trade_license;

    /**
     * @var string|null Численность сотрудников организации. Поле доступно только в коммерческом API
     */
    public ?string $employees_org_count;

    /**
     * @var array|null Идентификатор источника данных об объекте. Если отсутсвует, источник данных — 2GIS.
     */
    public ?array $sources;

    /**
     * Branch constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->id = new LongId($data['id']);
        $this->name_extended = new Branch\NameExtended($data['name_ex']);
        $this->org = new Organization($data['org']);
        $this->locale = $data['locale'];
        $this->rubrics = array_map(static fn($rubric_data) => new Rubric($rubric_data), $data['rubrics']);
        $this->region_id = $data['region_id'] ?? null;
        $this->segment_id = $data['segment_id'] ?? null;
        $this->building_name = $data['building_name'] ?? null;
        $this->has_apartments_info = $data['has_apartments_info'] ?? null;

        if (isset($data['external_content'])) {
            $this->external_content = [];
            foreach ($data['external_content'] as $external_content_data) {
                $this->external_content[] = new ExternalContent($external_content_data);
            }
        }

        $this->structure_info = isset($data['structure_info']) ? new StructureInfo($data['structure_info']) : null;
        $this->itin = $data['itin'] ?? null;
        $this->schedule = isset($data['schedule']) ? new Schedule($data['schedule']) : null;
        $this->search_attributes = isset($data['search_attributes']) ? new SearchAttributes($data['search_attributes']): null;
        $this->floors = isset($data['floors']) ? new Floors($data['floors']) : null;
        $this->alias = $data['alias'] ?? null;
        $this->adm_divs = isset($data['adm_div'])
            ? array_map(static fn($adm_div_data) => new AdmDivision($adm_div_data), $data['adm_div'])
            : null;
        $this->context = isset($data['context']) ? new Context($data['context']) : null;
        $this->address_comment = $data['address_comment'] ?? null;
        $this->geometry = isset($data['geometry']) ? new Geometry($data['geometry']) : null;
        $this->dates = isset($data['dates']) ? new Dates($data['dates']) : null;
        $this->is_routing_available = $data['is_routing_available'] ?? null;
        $this->reviews = isset($data['reviews']) ? new Review($data['reviews']) : null;
        $this->contact_groups = isset($data['contact_groups'])
            ? array_map(static fn($group_data) => new ContactsGroup($group_data), $data['contact_groups'])
            : null;
        $this->purpose_name = $data['purpose_name'] ?? null;
        $this->reply_rate = isset($data['reply_rate'])
            ? array_map(static fn($reply_rate_data) => new ReplyRate($reply_rate_data), $data['reply_rate'])
            : null;
        $this->address_name = $data['address_name'] ?? null;
        $this->address = isset($data['address']) ? new Address($data['address']) : null;
        $this->full_name = $data['full_name'] ?? null;
        $this->stop_factors = isset($data['stop_factors'])
            ? array_map(static fn($stop_factor_data) => new StopFactor($stop_factor_data), $data['stop_factors'])
            : null;
        $this->links = isset($data['links']) ? new Links($data['links']) : null;
        $this->order_with_cart = isset($data['order_with_cart'])
            ? array_map(static fn($order_with_cart_data) => new OrderWithCart($order_with_cart_data), $data['order_with_cart'])
            : null;
        $this->is_deleted = $data['is_deleted'] ?? false;
        $this->point = (isset($data['point'])) ? Point::fromArray($data['point']) : null;
        $this->city_alias = $data['city_alias'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->attribute_groups = isset($data['attribute_groups'])
            ? array_map(static fn($attribute_group_data) => new AttributesGroup($attribute_group_data), $data['attribute_groups'])
            : null;
        $this->flags = isset($data['flags']) ? new Flags($data['flags']) :null;
        $this->timezone_offset = $data['timezone_offset'] ?? null;
        $this->full_address_name = $data['full_address_name'] ?? null;
        $this->delivery = isset($data['delivery']) ? new Branch\Delivery($data['delivery']) : null;
        $this->description = $data['description'] ?? null;
        $this->trade_license = isset($data['trade_license']) ? new TradeLicense($data['trade_license']) : null;
        $this->employees_org_count = $data['employees_org_count'] ?? null;
        $this->sources = $data['sources'] ?? null;
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Item::TYPE_BRANCH;
    }

    /**
     * @return string
     */
    public function getIdPrimary(): string
    {
        if (!preg_match('|^(\d+)_|', $this->id, $match)) {
            throw new Error("Primary branch id not found in: {$this->id}");
        }
        return $match[1];
    }

    /**
     * @return string
     */
    public function getIdSecondary(): string
    {
        if (!preg_match('|^\d+_(.*)$|su', $this->id, $match)) {
            throw new Error("Secondary branch id not found in: {$this->id}");
        }
        return $match[1];
    }
}

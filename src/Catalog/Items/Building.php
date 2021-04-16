<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items;

use Kuvardin\DoubleGis\Catalog\Address\Address;
use Kuvardin\DoubleGis\Catalog\AdmDivision;
use Kuvardin\DoubleGis\Catalog\Groups\Group;
use Kuvardin\DoubleGis\Catalog\Item;
use Kuvardin\DoubleGis\Catalog\Items\Building\Attraction;
use Kuvardin\DoubleGis\Catalog\Items\Building\Context;
use Kuvardin\DoubleGis\Catalog\Items\Building\Floors\Floors;
use Kuvardin\DoubleGis\Catalog\Items\Building\Floors\Plans;
use Kuvardin\DoubleGis\Catalog\Items\Building\StructureInfo;
use Kuvardin\DoubleGis\Catalog\Links\Links;
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
     * @var string Идентификатор региона
     */
    public string $region_id;

    /**
     * @var string|null Уникальный идентификатор сегмента
     */
    public ?string $segment_id;

    /**
     * @var string Название дома
     */
    public string $name;

    /**
     * @var string|null Название дома
     * (для использования в функционале «поделиться», для конечных точек маршрута и т. д.).
     */
    public ?string $caption;

    /**
     * @var string Полное название дома
     */
    public string $full_name;

    /**
     * @var string|null Собственное имя здания
     */
    public ?string $building_name = null;

    /**
     * @var bool|null Признак того, что это главный объект в группе объектов гибрида
     */
    public ?bool $is_main_in_group = null;

    /**
     * @var string Описание назначения здания
     */
    public string $purpose_name;

    /**
     * @var string Текущая локаль
     */
    public string $locale;

    /**
     * @var bool Если true, то проезд до объекта возможен, если false или отсутствует, то нет
     */
    public bool $is_routing_available;

    /**
     * @var bool Признак наличия в здании недвижимости на продаже
     */
    public bool $has_realty;

    /**
     * @var bool Признак наличия в здании обслуживающих организаций с возможностью оплатить их услуги онлайн
     */
    public bool $has_payments;

    /**
     * @var bool|null Признак наличия информации о квартирах в здании
     */
    public ?bool $has_apartments_info = null;

    /**
     * @var AdmDivision[] Принадлежность к административной территории
     */
    public array $adm_div = [];

    /**
     * @var Group[]|null Связанные в объединённую карточку объекты
     */
    public ?array $groups = null;

    /**
     * @var Address Адрес дома
     */
    public Address $address;

    /**
     * @var string|null Представление поля address в виде одной строки
     */
    public ?string $address_name;

    /**
     * @var string|null Представление адреса в виде одной строки с указанием города
     */
    public ?string $full_address_name;

    /**
     * @var Floors Количество этажей
     */
    public Floors $floors;

    /**
     * @var Plans|null Информация об этажах здания
     */
    public ?Plans $floor_plans = null;

    /**
     * @var StructureInfo|null
     */
    public ?StructureInfo $structure_info = null;

    /**
     * @var Attraction|null Описание достопримечательности
     */
    public ?Attraction $attraction = null;

    /**
     * @var Geometry Геометрия здания
     */
    public Geometry $geometry;

    /**
     * @var int|null Количество организаций в здании, на которые можно написать отзыв на flamp.ru
     */
    public ?int $allowed_for_reviews_count = null;

    /**
     * @var Context
     */
    public Context $context;

    /**
     * @var array
     */
    public array $external_content;

    /**
     * @var Links|null
     */
    public ?Links $links = null;

    /**
     * @var Point
     */
    public Point $point;

    /**
     * @var string
     */
    public string $reg_bc_url;

    /**
     * @var array
     */
    public array $reviews;

    /**
     * @var array
     */
    public array $stat;

    /**
     * Building constructor.
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
        $this->building_name = $data['building_name'] ?? null;
        $this->is_main_in_group = $data['is_main_in_group'] ?? null;
        $this->purpose_name = $data['purpose_name'];
        $this->locale = $data['locale'];
        $this->is_routing_available = $data['is_routing_available'];
        $this->has_realty = $data['has_realty'];
        $this->has_payments = $data['has_payments'];
        $this->has_apartments_info = $data['has_apartments_info'] ?? null;

        foreach ($data['adm_div'] as $adm_div_data) {
            $this->adm_div[] = new AdmDivision($adm_div_data);
        }

        if (isset($data['group'])) {
            $this->groups = [];
            foreach ($data['group'] as $group_data) {
                $this->groups[] = new Group($group_data);
            }
        }

        $this->address = new Address($data['address']);
        $this->address_name = $data['address_name'] ?? null;
        $this->full_address_name = $data['full_address_name'] ?? null;
        $this->floors = new Floors($data['floors']);
        $this->floor_plans = isset($data['floor_plans']) ? new Plans($data['floor_plans']) : null;
        $this->structure_info = isset($data['structure_info']) ? new StructureInfo($data['structure_info']) : null;
        $this->attraction = isset($data['attraction']) ? new Attraction($data['attraction']) : null;
        $this->geometry = new Geometry($data['geometry']);
        $this->allowed_for_reviews_count = $data['allowed_for_reviews_count'] ?? null;
        $this->context = new Context($data['context']);
        $this->links = isset($data['links']) ? new Links($data['links']) : null;
        
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Item::TYPE_BUILDING;
    }
}

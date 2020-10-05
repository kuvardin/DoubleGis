<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Items;

use Items\Branch\Delivery;
use Kuvardin\DoubleGis\Address\Address;
use Kuvardin\DoubleGis\AdmDivision\AdmDivision;
use Kuvardin\DoubleGis\Contacts\Group as ContactsGroup;
use Kuvardin\DoubleGis\Items\Branch\Attributes\Group as AttributesGroup;
use Kuvardin\DoubleGis\Items\Branch\NameExtended;
use Kuvardin\DoubleGis\Location;
use Kuvardin\DoubleGis\Organization;
use Kuvardin\DoubleGis\Shedule\Shedule;
use Kuvardin\DoubleGis\Rubrics\Rubric;

/**
 * Филиал
 *
 * @package Kuvardin\DoubleGis\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Branch extends Item
{
    /**
     * @var string Уникальный идентификатор филиала организации
     */
    public string $id;

    /**
     * @var string|null Уникальный идентификатор проекта
     */
    public ?string $region_id;

    /**
     * @var string|null Уникальный идентификатор сегмента
     */
    public ?string $segment_id;

    /**
     * @var string Полное собственное название филиала или название организации
     */
    public string $name;

    /**
     * @var string|null Полное собственное название филиала или название организации
     */
    public ?string $caption;

    /**
     * @var string|null Временная зона объекта в формате POSIX
     */
    public ?string $timezone;

    /**
     * @var Branch\NameExtended|null Составные части наименования организации
     */
    public ?Branch\NameExtended $name_extended;

    /**
     * @var string|null Псевдоним названия организации.
     */
    public ?string $alias;

    /**
     * @var string|null Индивидуальный номер налогоплательщика. Поле доступно только в коммерческом API
     */
    public ?string $itin;

    /**
     * @var bool Признак удаленного объекта
     */
    public bool $is_deleted;

    /**
     * @var bool|null Если true, то проезд до объекта возможен, если false или отсутствует, то нет
     */
    public ?bool $is_routing_available;

    /**
     * @var bool|null Признак того, что это главный объект в группе объектов гибрида
     */
    public ?bool $is_main_in_group;

    /**
     * @var bool|null Фирма участвует в промо-акции "Чека"
     */
    public ?bool $is_promoted;

    /**
     * @var bool|null Фирма опубликовала свой список товаров
     */
    public ?bool $has_goods;

    /**
     * @var bool|null Признак наличия в здании недвижимости на продаже
     */
    public ?bool $has_realty;

    /**
     * @var bool|null У фирмы включен блок «Закрепленные товары»
     */
    public ?bool $has_pinned_goods;

    /**
     * @var bool|null Признак того, что можно оплатить услуги фирмы онлайн
     */
    public ?bool $has_payments;

    /**
     * @var bool|null Признак того, что у фирмы есть услуга доставки
     */
    public ?bool $has_delivery;

    /**
     * @var Delivery|null Объект, описывающий свойства доставки организации
     */
    public ?Delivery $delivery;

    // TODO: public $order_with_cart;
    // TODO: public $reply_rate;

    /**
     * @var bool|null Признак наличия информации о квартирах в здании
     */
    public ?bool $has_apartments_info;

    /**
     * @var Location|null Координаты точки поиска, заданные в системе координат WGS84 в формате lon, lat
     */
    public ?Location $point;

    /**
     * @var string|null URL для регистрации бизнес-коннекшна просмотра профиля
     */
    public ?string $reg_bc_url;

    /**
     * @var AdmDivision[]|null Принадлежность к административной территории
     */
    public ?array $adm_divs;

    /**
     * @var Address|null Адрес, по которому располагается филиал организации
     */
    public ?Address $address;

//    TODO: public array $group;
//    TODO: public array $trade_license;

    /**
     * @var string|null Представление поля address в виде одной строки
     */
    public ?string $address_name;

    /**
     * @var string|null Представление адреса в виде одной строки с указанием города
     */
    public ?string $full_address_name;

    /**
     * @var string|null Уточнение о местоположении филиала по указанному адресу
     */
    public ?string $address_comment;

    /**
     * @var string|null Численность сотрудников организации. Поле доступно только в коммерческом API
     */
    public ?string $employees_org_count;

    /**
     * @var Organization|null Описание свойств организации
     */
    public ?Organization $org;

    /**
     * @var Branch\Attributes\Group[]|null Дополнительные атрибуты филиала
     */
    public ?array $attribute_groups;

    /**
     * @var string|null Текущая локаль для региона
     */
    public ?string $locale;

    /**
     * @var ContactsGroup[]|null Контакты филиала
     */
    public ?array $contact_groups;

    /**
     * @var Shedule|null Расписание работы филиала
     */
    public ?Shedule $shedule;

    /**
     * @var Rubric[]|null Рубрики филиала
     */
    public ?array $rubrics;

    /**
     * Branch constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->id = $data['id'];
        $this->region_id = $data['region_id'] ?? null;
        $this->segment_id = $data['segment_id'] ?? null;
        $this->name = $data['name'];
        $this->caption = $data['caption'] ?? null;
        $this->timezone = $data['timezone'] ?? null;
        $this->name_extended = isset($data['name_ex']) ? new NameExtended($data['name_ex']) : null;
        $this->alias = $data['alias'] ?? null;
        $this->itin = $data['itin'] ?? null;
        $this->is_deleted = $data['is_deleted'] ?? false;
        $this->is_routing_available = $data['is_routing_available'] ?? null;
        $this->is_main_in_group = $data['is_main_in_group'] ?? null;
        $this->is_promoted = $data['is_promoted'] ?? null;
        $this->has_goods = $data['has_goods'] ?? null;
        $this->has_realty = $data['has_realty'] ?? null;
        $this->has_pinned_goods = $data['has_pinned_goods'] ?? null;
        $this->has_payments = $data['has_payments'] ?? null;
        $this->has_delivery = $data['has_delivery'] ?? null;
        $this->delivery = isset($data['delivery']) ? new Delivery($data['delivery']) : null;

//        $this->order_with_cart =
//        $this->reply_rate =

        $this->has_apartments_info = $data['has_apartments_info'] ?? null;
        $this->point = isset($data['point']) ? new Location($data['point']) : null;
        $this->reg_bc_url = $data['reg_bc_url'] ?? null;
        $this->adm_divs = isset($data['adm_div'])
            ? array_map(static fn($adm_div_data) => new AdmDivision($adm_div_data), $data['adm_div'])
            : null;
//        $this->group
        $this->address = isset($data['address']) ? new Address($data['address']) : null;
//        $this->trade_license
        $this->address_name = $data['address_name'] ?? null;
        $this->full_address_name = $data['full_address_name'] ?? null;
        $this->address_comment = $data['address_comment'] ?? null;
        $this->employees_org_count = $data['employees_org_count'] ?? null;
        $this->org = isset($data['org']) ? new Organization($data['org']) : null;
        $this->attribute_groups = isset($data['attribute_groups'])
            ? array_map(static fn($group_data) => new AttributesGroup($group_data), $data['attribute_groups'])
            : null;
        $this->locale = $data['locale'] ?? null;
        $this->contact_groups = isset($data['contact_groups'])
            ? array_map(static fn($group_data) => new ContactsGroup($group_data), $data['contact_groups'])
            : null;

        $this->shedule = isset($data['schedule']) ? new Shedule($data['schedule']) : null;
//        $this->external_content
        $this->rubrics = isset($data['rubrics'])
            ?array_map(static fn($rubric_data) => new Rubric($rubric_data), $data['rubrics'])
            : null;
        // ...
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Types::BRANCH;
    }
}

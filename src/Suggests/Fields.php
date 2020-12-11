<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Suggests;

/**
 * Class Fields
 *
 * @package Kuvardin\DoubleGis\Suggests
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Fields
{
    // Список полей с информацией о геометрии и адресе места:

    /** координаты объекта, заданные в системе координат WGS84 в формате lon, lat */
    public const ITEMS_POINT = 'items.point';

    /** адрес, по которому располагается объект */
    public const ITEMS_ADDRESS = 'items.address';

    /** принадлежность к административной территории */
    public const ITEMS_ADM_DIV = 'items.adm_div';

    /** адрес объекта с указанием города */
    public const ITEMS_FULL_ADDRESS_NAME = 'items.full_address_name';

    /** визуальный центр геометрии объекта */
    public const ITEMS_GEOMETRY_CENTROID = 'items.geometry.centroid';

    /** геометрия области, используемой для определения попадания курсора в зону объекта */
    public const ITEMS_GEOMETRY_HOVER = 'items.geometry.hover';

    /** геометрия для выделения объекта */
    public const ITEMS_GEOMETRY_SELECTION = 'items.geometry.selection';

    // Список полей с дополнительной информацией о месте:

    /** категории компании */
    public const ITEMS_RUBRICS = 'items.rubrics';

    /** организация, к которой относится филиал */
    public const ITEMS_ORG = 'items.org';

    /** контакты компании */
    public const ITEMS_CONTACT_GROUPS = 'items.contact_groups';

    /** расписание работы компании */
    public const ITEMS_SCHEDULE = 'items.schedule';

    /** локализованное название для типа доступа */
    public const ITEMS_ACCESS_COMMENT = 'items.access_comment';

    /** локализованное название типа доступа */
    public const ITEMS_ACCESS_NAME = 'items.access_name';

    /** тип доступа для парковки */
    public const ITEMS_ACCESS = 'items.access';

    /** описание достопримечательности */
    public const ITEMS_ATTRACTION = 'items.attraction';

    /** вместимость парковки */
    public const ITEMS_CAPACITY = 'items.capacity';

    /** описание геообъекта */
    public const ITEMS_DESCRIPTION = 'items.description';

    /** дополнительные данные компании, такие как буклеты и фотографии */
    public const ITEMS_EXTERNAL_CONTENT = 'items.external_content';

    /** список признаков объекта */
    public const ITEMS_FLAGS = 'items.flags';

    /** количество этажей */
    public const ITEMS_FLOORS = 'items.floors';

    /** является ли парковка платной */
    public const ITEMS_IS_PAID = 'items.is_paid';

    /** количество уровней парковки */
    public const ITEMS_LEVEL_COUNT = 'items.level_count';

    /** связанные объекты */
    public const ITEMS_LINKS = 'items.links';

    /** составные части наименования объекта */
    public const ITEMS_NAME_EX = 'items.name_ex';

    /** фотографии, связанные с компанией */
    public const ITEMS_PHOTOS = 'items.photos';

    /** отзывы об объекте */
    public const ITEMS_REVIEWS = 'items.reviews';

    /** cводная информация о геообъекте */
    public const ITEMS_STATISTICS = 'items.statistics';

    // Список служебных полей:

    /** контекстный баннер */
    public const CB = 'cb';

    /** массив контекстных категорий */
    public const CONTEXT_RUBRICS = 'context_rubrics';

    /** блок «Возможно, вы имели ввиду» */
    public const DYM = 'dym';

    /** фильтры для дополнительного поиска */
    public const FILTERS = 'filters';

    /** базовый хеш */
    public const HASH = 'hash';

    /** флаг «условного адреса» */
    public const ITEMS_ADDRESS_IS_CONDITIONAL = 'items.address.is_conditional';

    /** рекламные опции */
    public const ITEMS_ADS_OPTIONS = 'items.ads.options';

    /** дополнительные атрибуты компании */
    public const ITEMS_ATTRIBUTE_GROUPS = 'items.attribute_groups';

    /** динамическая информация */
    public const ITEMS_CONTEXT = 'items.context';

    /** дата удаления организации из базы в формате ISO 8601 */
    public const ITEMS_DATES_DELETED_AT = 'items.dates.deleted_at';

    /** дата последнего изменения информации об организации в формате ISO 8601 */
    public const ITEMS_DATES_UPDATED_AT = 'items.dates.updated_at';

    /** время внесения информации о компании в БД */
    public const ITEMS_DATES = 'items.dates';

    /** идентификатор стиля для отображения */
    public const ITEMS_GEOMETRY_STYLE = 'items.geometry.style';

    /** связанные в объединённую карточку объекты */
    public const ITEMS_GROUP = 'items.group';

    /** есть доставка */
    public const ITEMS_HAS_DELIVERY = 'items.has_delivery';

    /** загружен список товаров фирмы */
    public const ITEMS_HAS_GOODS = 'items.has_goods';

    /** есть возможность оплатить услуги фирмы онлайн */
    public const ITEMS_HAS_PAYMENTS = 'items.has_payments';

    /** у фирмы включен блок «Закрепленные товары» */
    public const ITEMS_HAS_PINNED_GOODS = 'items.has_pinned_goods';

    /** есть недвижимость на продаже */
    public const ITEMS_HAS_REALTY = 'items.has_realty';

    /** признак того, что это главный объект в группе объектов гибрида */
    public const ITEMS_IS_MAIN_IN_GROUP = 'items.is_main_in_group';

    /** алиас города, в котором находится объект */
    public const ITEMS_CITY_ALIAS = 'items.city_alias';

    /** фирма участвует в промо-акции Чека */
    public const ITEMS_IS_PROMOTED = 'items.is_promoted';

    /** флаг, возможен ли проезд до объекта */
    public const ITEMS_IS_ROUTING_AVAILABLE = 'items.is_routing_available';

    /** показать номер входа на станцию метро, если объект является входом (station_entrance) */
    public const ITEMS_ENTRANCE_DISPLAY_NAME = 'items.entrance_display_name';

    /** текущая локаль для региона */
    public const ITEMS_LOCALE = 'items.locale';

    /** URL для регистрации бизнес-коннекшна просмотра профиля */
    public const ITEMS_REG_BC_URL = 'items.reg_bc_url';

    /** уникальный идентификатор проекта */
    public const ITEMS_REGION_ID = 'items.region_id';

    /** данные для формирования сообщений статистики */
    public const ITEMS_STAT = 'items.stat';

    /** набор блокирующих атрибутов, соответствующих запросу */
    public const ITEMS_STOP_FACTORS = 'items.stop_factors';

    /** тип поискового запроса */
    public const REQUEST_TYPE = 'request_type';

    /** информация о произведённом поиске */
    public const SEARCH_ATTRIBUTES = 'search_attributes';

    /** виджеты */
    public const WIDGETS = 'widgets';

    /** информация для отправки броадкаст сообщений в компании */
    public const BROADCAST = 'broadcast';

    /** все поля */
    public const ALL = [
        self::ITEMS_POINT,
        self::ITEMS_ADDRESS,
        self::ITEMS_ADM_DIV,
        self::ITEMS_FULL_ADDRESS_NAME,
        self::ITEMS_GEOMETRY_CENTROID,
        self::ITEMS_GEOMETRY_HOVER,
        self::ITEMS_GEOMETRY_SELECTION,
        self::ITEMS_RUBRICS,
        self::ITEMS_ORG,
        self::ITEMS_CONTACT_GROUPS,
        self::ITEMS_SCHEDULE,
        self::ITEMS_ACCESS_COMMENT,
        self::ITEMS_ACCESS_NAME,
        self::ITEMS_ACCESS,
        self::ITEMS_ATTRACTION,
        self::ITEMS_CAPACITY,
        self::ITEMS_DESCRIPTION,
        self::ITEMS_EXTERNAL_CONTENT,
        self::ITEMS_FLAGS,
        self::ITEMS_FLOORS,
        self::ITEMS_IS_PAID,
        self::ITEMS_LEVEL_COUNT,
        self::ITEMS_LINKS,
        self::ITEMS_NAME_EX,
        self::ITEMS_PHOTOS,
        self::ITEMS_REVIEWS,
        self::ITEMS_STATISTICS,
        self::CB,
        self::CONTEXT_RUBRICS,
        self::DYM,
        self::FILTERS,
        self::HASH,
        self::ITEMS_ADDRESS_IS_CONDITIONAL,
        self::ITEMS_ADS_OPTIONS,
        self::ITEMS_ATTRIBUTE_GROUPS,
        self::ITEMS_CONTEXT,
        self::ITEMS_DATES_DELETED_AT,
        self::ITEMS_DATES_UPDATED_AT,
        self::ITEMS_DATES,
        self::ITEMS_GEOMETRY_STYLE,
        self::ITEMS_GROUP,
        self::ITEMS_HAS_DELIVERY,
        self::ITEMS_HAS_GOODS,
        self::ITEMS_HAS_PAYMENTS,
        self::ITEMS_HAS_PINNED_GOODS,
        self::ITEMS_HAS_REALTY,
        self::ITEMS_IS_MAIN_IN_GROUP,
        self::ITEMS_CITY_ALIAS,
        self::ITEMS_IS_PROMOTED,
        self::ITEMS_IS_ROUTING_AVAILABLE,
        self::ITEMS_ENTRANCE_DISPLAY_NAME,
        self::ITEMS_LOCALE,
        self::ITEMS_REG_BC_URL,
        self::ITEMS_REGION_ID,
        self::ITEMS_STAT,
        self::ITEMS_STOP_FACTORS,
        self::REQUEST_TYPE,
        self::SEARCH_ATTRIBUTES,
        self::WIDGETS,
        self::BROADCAST,
    ];

    private function __construct()
    {
    }
}

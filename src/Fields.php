<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis;

/**
 * Список полей с информацией о геометрии и адресе места.
 *
 * @package Kuvardin\DoubleGis
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Fields
{
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

    /** [дополнительное] категории компании */
    public const ITEMS_RUBRICS = 'items.rubrics';

    /** [дополнительное] организация, к которой относится филиал */
    public const ITEMS_ORG = 'items.org';

    /** [дополнительное] контакты компании */
    public const ITEMS_CONTACT_GROUPS = 'items.contact_groups';

    /** [дополнительное] расписание работы компании */
    public const ITEMS_SCHEDULE = 'items.schedule';

    /** [дополнительное] локализованное название для типа доступа */
    public const ITEMS_ACCESS_COMMENT = 'items.access_comment';

    /** [дополнительное] локализованное название типа доступа */
    public const ITEMS_ACCESS_NAME = 'items.access_name';

    /** [дополнительное] тип доступа для парковки */
    public const ITEMS_ACCESS = 'items.access';

    /** [дополнительное] описание достопримечательности */
    public const ITEMS_ATTRACTION = 'items.attraction';

    /** [дополнительное] вместимость парковки */
    public const ITEMS_CAPACITY = 'items.capacity';

    /** [дополнительное] описание геообъекта */
    public const ITEMS_DESCRIPTION = 'items.description';

    /** [дополнительное] дополнительные данные компании, такие как буклеты и фотографии */
    public const ITEMS_EXTERNAL_CONTENT = 'items.external_content';

    /** [дополнительное] список признаков объекта */
    public const ITEMS_FLAGS = 'items.flags';

    /** [дополнительное] количество этажей */
    public const ITEMS_FLOORS = 'items.floors';

    /** [дополнительное] является ли парковка платной */
    public const ITEMS_IS_PAID = 'items.is_paid';

    /** [дополнительное] количество уровней парковки */
    public const ITEMS_LEVEL_COUNT = 'items.level_count';

    /** [дополнительное] связанные объекты */
    public const ITEMS_LINKS = 'items.links';

    /** [дополнительное] составные части наименования объекта */
    public const ITEMS_NAME_EX = 'items.name_ex';

    /** [дополнительное] фотографии, связанные с компанией */
    public const ITEMS_PHOTOS = 'items.photos';

    /** [дополнительное] отзывы об объекте */
    public const ITEMS_REVIEWS = 'items.reviews';

    /** [дополнительное] cводная информация о геообъекте */
    public const ITEMS_STATISTICS = 'items.statistics';

    /** [служебное] контекстный баннер */
    public const CB = 'cb';

    /** [служебное] массив контекстных категорий */
    public const CONTEXT_RUBRICS = 'context_rubrics';

    /** [служебное] блок «Возможно, вы имели ввиду» */
    public const DYM = 'dym';

    /** [служебное] фильтры для дополнительного поиска */
    public const FILTERS = 'filters';

    /** [служебное] базовый хеш */
    public const HASH = 'hash';

    /** [служебное] флаг «условного адреса» */
    public const ITEMS_ADDRESS_IS_CONDITIONAL = 'items.address.is_conditional';

    /** [служебное] рекламные опции */
    public const ITEMS_ADS_OPTIONS = 'items.ads.options';

    /** [служебное] дополнительные атрибуты компании */
    public const ITEMS_ATTRIBUTE_GROUPS = 'items.attribute_groups';

    /** [служебное] динамическая информация */
    public const ITEMS_CONTEXT = 'items.context';

    /** [служебное] дата удаления организации из базы в формате ISO 8601 */
    public const ITEMS_DATES_DELETED_AT = 'items.dates.deleted_at';

    /** [служебное] дата последнего изменения информации об организации в формате ISO 8601 */
    public const ITEMS_DATES_UPDATED_AT = 'items.dates.updated_at';

    /** [служебное] время внесения информации о компании в БД */
    public const ITEMS_DATES = 'items.dates';

    /** [служебное] идентификатор стиля для отображения */
    public const ITEMS_GEOMETRY_STYLE = 'items.geometry.style';

    /** [служебное] связанные в объединённую карточку объекты */
    public const ITEMS_GROUP = 'items.group';

    /** [служебное] есть доставк */
    public const ITEMS_HAS_DELIVERY = 'items.has_delivery';

    /** [служебное] загружен список товаров фирм */
    public const ITEMS_HAS_GOODS = 'items.has_goods';

    /** [служебное] есть возможность оплатить услуги фирмы онлай */
    public const ITEMS_HAS_PAYMENTS = 'items.has_payments';

    /** [служебное] у фирмы включен блок «Закрепленные товары */
    public const ITEMS_HAS_PINNED_GOODS = 'items.has_pinned_goods';

    /** [служебное] есть недвижимость на продаж */
    public const ITEMS_HAS_REALTY = 'items.has_realty';

    /** [служебное] признак того, что это главный объект в группе объектов гибрида */
    public const ITEMS_IS_MAIN_IN_GROUP = 'items.is_main_in_group';

    /** [служебное] фирма участвует в промо-акции Чек */
    public const ITEMS_IS_PROMOTED = 'items.is_promoted';

    /** [служебное] флаг, возможен ли проезд до объекта */
    public const ITEMS_IS_ROUTING_AVAILABLE = 'items.is_routing_available';

    /** [служебное] текущая локаль для региона */
    public const ITEMS_LOCALE = 'items.locale';

    /** [служебное] URL для регистрации бизнес-коннекшна просмотра профиля */
    public const ITEMS_REG_BC_URL = 'items.reg_bc_url';

    /** [служебное] уникальный идентификатор проекта */
    public const ITEMS_REGION_ID = 'items.region_id';

    /** [служебное] данные для формирования сообщений статистики */
    public const ITEMS_STAT = 'items.stat';

    /** [служебное] набор блокирующих атрибутов, соответствующих запросу */
    public const ITEMS_STOP_FACTORS = 'items.stop_factors';

    /** [служебное] тип поискового запроса */
    public const REQUEST_TYPE = 'request_type';

    /** [служебное] информация о произведённом поиске */
    public const SEARCH_ATTRIBUTES = 'search_attributes';

    /** [служебное] виджеты */
    public const WIDGETS = 'widgets';

    /** список всех полей */
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
        self::ITEMS_IS_PROMOTED,
        self::ITEMS_IS_ROUTING_AVAILABLE,
        self::ITEMS_LOCALE,
        self::ITEMS_REG_BC_URL,
        self::ITEMS_REGION_ID,
        self::ITEMS_STAT,
        self::ITEMS_STOP_FACTORS,
        self::REQUEST_TYPE,
        self::SEARCH_ATTRIBUTES,
        self::WIDGETS,
    ];

    private function __construct() {}

    /**
     * @param string $field
     * @return bool
     */
    public static function check(string $field): bool
    {
        return in_array($field, self::ALL, true);
    }
}

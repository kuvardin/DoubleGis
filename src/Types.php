<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis;

/**
 * Типы объектов.
 *
 * @package Kuvardin\DoubleGis
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Types
{
    /** адрес */
    public const ADDRESS = 'address';

    /** компания */
    public const BRANCH = 'branch';

    /** здание */
    public const BUILDING = 'building';

    /** улица */
    public const STREET = 'street';

    /** остановка */
    public const STATION = 'station';

    /** станция метро */
    public const STATION_METRO = 'station.metro';

    /** пользовательский саггест */
    public const USER_QUERIES = 'user_queries';

    /** район */
    public const ADM_DIV_DISTRICT = 'adm_div.district';

    /** район области */
    public const ADM_DIV_DISTRICT_AREA = 'adm_div.district_area';

    /** населённый пункт */
    public const ADM_DIV_SETTLEMENT = 'adm_div.settlement';

    /** город */
    public const ADM_DIV_CITY = 'adm_div.city';

    /** страна */
    public const ADM_DIV_COUNTRY = 'adm_div.country';

    /** регион (область/край/республика и т.п.) */
    public const ADM_DIV_REGION = 'adm_div.region';

    /** место */
    public const ADM_DIV_PLACE = 'adm_div.place';

    /** жилмассив, микрорайон */
    public const ADM_DIV_LIVING_AREA = 'adm_div.living_area';

    /** округ */
    public const ADM_DIV_DIVISION = 'adm_div.division';

    /** достопримечательность */
    public const ATTRACTION = 'attraction';

    /** перекрёсток */
    public const CROSSROAD = 'crossroad';

    /** категория */
    public const RUBRIC = 'rubric';

    /** метакатегория */
    public const META_RUBRIC = 'meta_rubric';

    /** дополнительный атрибут */
    public const ATTRIBUTE = 'attribute';

    /** населенный пункт, не принадлежащий к текущему проекту */
    public const FOREIGN_CITY = 'foreign_city';

    /** маршрут */
    public const ROUTE = 'route';

    /** тип маршрута */
    public const ROUTE_TYPE = 'route_type';

    /** дорога */
    public const ROAD = 'road';

    /** парковка */
    public const PARKING = 'parking';

    /** организация */
    public const ORG = 'org';

    /** глобальная координата */
    public const COORDINATES = 'coordinates';

    /** специальный */
    public const SPECIAL = 'special';

    /** скидки */
    public const DISCOUNT = 'discount';

    /** категории товаров. Требует наличия market.suggestor_category */
    public const MARKET_CATEGORY = 'market.category';

    /** необходим для раскрытия категорий товаров */
    public const MARKET_SUGGESTOR_CATEGORY = 'market.suggestor_category';

    /** наименования товаров */
    public const MARKET_ATTRIBUTE = 'market.attribute';

    /** бренд товаров */
    public const MARKET_BRAND = 'market.brand';

    /** список всех типов */
    public const ALL = [
        self::ADDRESS,
        self::BRANCH,
        self::BUILDING,
        self::STREET,
        self::STATION,
        self::STATION_METRO,
        self::USER_QUERIES,
        self::ADM_DIV_DISTRICT,
        self::ADM_DIV_DISTRICT_AREA,
        self::ADM_DIV_SETTLEMENT,
        self::ADM_DIV_CITY,
        self::ADM_DIV_COUNTRY,
        self::ADM_DIV_REGION,
        self::ADM_DIV_PLACE,
        self::ADM_DIV_LIVING_AREA,
        self::ADM_DIV_DIVISION,
        self::ATTRACTION,
        self::CROSSROAD,
        self::RUBRIC,
        self::META_RUBRIC,
        self::ATTRIBUTE,
        self::FOREIGN_CITY,
        self::ROUTE,
        self::ROUTE_TYPE,
        self::ROAD,
        self::PARKING,
        self::ORG,
        self::COORDINATES,
        self::SPECIAL,
        self::DISCOUNT,
        self::MARKET_CATEGORY,
        self::MARKET_SUGGESTOR_CATEGORY,
        self::MARKET_ATTRIBUTE,
        self::MARKET_BRAND,
    ];

    private function __construct() {}

    /**
     * @param string $type
     * @return bool
     */
    public static function check(string $type): bool
    {
        return in_array($type, self::ALL, true);
    }
}

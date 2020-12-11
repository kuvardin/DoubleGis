<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Suggests;

/**
 * Типы подсказки
 *
 * @package Kuvardin\DoubleGis\Suggest
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

    /** вход на станцию */
    public const STATION_ENTRANCE = 'station_entrance';

    /** пользовательский саггест */
    public const USER_QUERIES = 'user_queries';

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

    /** станция метро */
    public const STATION_METRO = 'station.metro';

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

    /** категории товаров. Требует наличия market.suggestor_category */
    public const MARKET_CATEGORY = 'market.category';

    /** необходим для раскрытия категорий товаров */
    public const MARKET_SUGGESTOR_CATEGORY = 'market.suggestor_category';

    /** наименования товаров */
    public const MARKET_ATTRIBUTE = 'market.attribute';

    /** бренд товаров */
    public const MARKET_BRAND = 'market.brand';

    /** все типы */
    public const ALL = [
        self::ADDRESS,
        self::BRANCH,
        self::BUILDING,
        self::STREET,
        self::STATION,
        self::STATION_ENTRANCE,
        self::USER_QUERIES,
        self::ATTRACTION,
        self::CROSSROAD,
        self::RUBRIC,
        self::META_RUBRIC,
        self::ATTRIBUTE,
        self::ROUTE,
        self::ROUTE_TYPE,
        self::ROAD,
        self::PARKING,
        self::ORG,
        self::COORDINATES,
        self::SPECIAL,
        self::STATION_METRO,
        self::ADM_DIV_DISTRICT,
        self::ADM_DIV_DISTRICT_AREA,
        self::ADM_DIV_SETTLEMENT,
        self::ADM_DIV_CITY,
        self::ADM_DIV_COUNTRY,
        self::ADM_DIV_REGION,
        self::ADM_DIV_PLACE,
        self::ADM_DIV_LIVING_AREA,
        self::ADM_DIV_DIVISION,
        self::MARKET_CATEGORY,
        self::MARKET_SUGGESTOR_CATEGORY,
        self::MARKET_ATTRIBUTE,
        self::MARKET_BRAND,
    ];

    /**
     * Types constructor.
     */
    private function __construct()
    {
    }

    /**
     * @param string $type
     * @return bool
     */
    public static function check(string $type): bool
    {
        return in_array($type, self::ALL);
    }
}

<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog;

/**
 * Типы объектов.
 *
 * @package Kuvardin\DoubleGis
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Types
{
    /** компания */
    public const BRANCH = 'branch';

    /** здание */
    public const BUILDING = 'building';

    /** улица */
    public const STREET = 'street';

    /** парковка */
    public const PARKING = 'parking';

    /** остановка */
    public const STATION = 'station';

    /** tro — станция метро */
    public const STATION_METRO = 'station.metro';

    /** достопримечательность */
    public const ATTRACTION = 'attraction';

    /** перекрёсток */
    public const CROSSROAD = 'crossroad';

    /** проход/проезд */
    public const GATE = 'gate';

    /** дорога */
    public const ROAD = 'road';

    /** маршрут */
    public const ROUTE = 'route';

    /** административная единица */
    public const ADM_DIV = 'adm_div';

    /** город */
    public const ADM_DIV_CITY = 'adm_div.city';

    /** страна */
    public const ADM_DIV_COUNTRY = 'adm_div.country';

    /** район области */
    public const ADM_DIV_DISTRICT_AREA = 'adm_div.district_area';

    /** район */
    public const ADM_DIV_DISTRICT = 'adm_div.district';

    /** округ */
    public const ADM_DIV_DIVISION = 'adm_div.division';

    /** жилмассив, микрорайон */
    public const ADM_DIV_LIVING_AREA = 'adm_div.living_area';

    /** место */
    public const ADM_DIV_PLACE = 'adm_div.place';

    /** регион (область/край/республика и т.п.) */
    public const ADM_DIV_REGION = 'adm_div.region';

    /** населённый пункт */
    public const ADM_DIV_SETTLEMENT = 'adm_div.settlement';

    /** глобальная координата */
    public const COORDINATES = 'coordinates';


    /** список всех типов */
    public const ALL = [
        self::BRANCH,
        self::BUILDING,
        self::STREET,
        self::PARKING,
        self::STATION,
        self::STATION_METRO,
        self::ATTRACTION,
        self::CROSSROAD,
        self::GATE,
        self::ROAD,
        self::ROUTE,
        self::ADM_DIV,
        self::ADM_DIV_CITY,
        self::ADM_DIV_COUNTRY,
        self::ADM_DIV_DISTRICT_AREA,
        self::ADM_DIV_DISTRICT,
        self::ADM_DIV_DIVISION,
        self::ADM_DIV_LIVING_AREA,
        self::ADM_DIV_PLACE,
        self::ADM_DIV_REGION,
        self::ADM_DIV_SETTLEMENT,
        self::COORDINATES,
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

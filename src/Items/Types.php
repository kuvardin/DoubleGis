<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Items;

/**
 * Class Types
 *
 * @package Kuvardin\DoubleGis\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Types
{
    /** филиал */
    public const BRANCH = 'branch';

    /** административная единица */
    public const ADM_DIV = 'adm_div';

    /** здание */
    public const BUILDING = 'building';

    /** улица */
    public const STREET = 'street';

    /** достопримечательность */
    public const ATTRACTION = 'attraction';

    /** перекресток */
    public const CROSSROAD = 'crossroad';

    /** парковка */
    public const PARKING = 'parking';

    /** дорога */
    public const ROAD = 'road';

    /** проход/проезд */
    public const GATE = 'gate';

    /** маршрут */
    public const ROUTE = 'route';

    /** остановка */
    public const STATION = 'station';

    /** остановочная платформа */
    public const STATION_PLATFORM = 'station_platform';

    /** вход на станцию */
    public const STATION_ENTRANCE = 'station_entrance';

    /** проект */
    public const PROJECT = 'project';

    /** глобальная координата */
    public const COORDINATES = 'coordinates';

    /** все типы */
    public const ALL = [
        self::BRANCH,
        self::ADM_DIV,
        self::BUILDING,
        self::STREET,
        self::ATTRACTION,
        self::CROSSROAD,
        self::PARKING,
        self::ROAD,
        self::GATE,
        self::ROUTE,
        self::STATION,
        self::STATION_PLATFORM,
        self::STATION_ENTRANCE,
        self::ROAD,
        self::PROJECT,
        self::COORDINATES,
    ];

    private function __construct() {}

    /**
     * @param string $type
     * @return bool
     */
    public function check(string $type): bool
    {
        return in_array($type, self::ALL, true);
    }
}

<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Routes;

/**
 * Class RouteTypes
 *
 * @package Kuvardin\DoubleGis\Catalog\Routes
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class RouteTypes
{
    /** автобус */
    public const BUS = 'bus';

    /** троллейбус */
    public const TROLLEYBUS = 'trolleybus';

    /** трамвай */
    public const TRAM = 'tram';

    /** маршрутное такси */
    public const SHUTTLE_BUS = 'shuttle_bus';

    /** метро */
    public const METRO = 'metro';

    /** электропоезд */
    public const SUBURBAN_TRAIN = 'suburban_train';

    /** фуникулёр */
    public const FUNICULAR_RAILWAY = 'funicular_railway';

    /** монорельс */
    public const MONORAIL = 'monorail';

    /** водный транспорт */
    public const RIVER_TRANSPORT = 'river_transport';

    /** канатная дорога */
    public const CABLE_CAR = 'cable_car';

    /** скоростной трамвай */
    public const LIGHT_RAIL = 'light_rail';

    /** метротрам */
    public const PREMETRO = 'premetro';

    /** лёгкое метро */
    public const LIGHT_METRO = 'light_metro';

    /** аэроэкспресс */
    public const AEROEXPRESS = 'aeroexpress';

    public const ALL = [
        self::BUS,
        self::TROLLEYBUS,
        self::TRAM,
        self::SHUTTLE_BUS,
        self::METRO,
        self::SUBURBAN_TRAIN,
        self::FUNICULAR_RAILWAY,
        self::MONORAIL,
        self::RIVER_TRANSPORT,
        self::CABLE_CAR,
        self::LIGHT_RAIL,
        self::PREMETRO,
        self::LIGHT_METRO,
        self::AEROEXPRESS,
    ];

    /**
     * RouteTypes constructor.
     */
    private function __construct()
    {
    }
}

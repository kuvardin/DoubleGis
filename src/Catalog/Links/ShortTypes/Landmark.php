<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Links\ShortTypes;

/**
 * Ориентир
 *
 * @package Kuvardin\DoubleGis\Catalog\Links\ShortTypes
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Landmark
{
    /** остановочная платформа */
    public const TYPE_STATION_PLATFORM = 'station_platform';

    /** вход на станцию */
    public const TYPE_STATION_ENTRANCE = 'station_entrance';

    /** здание */
    public const TYPE_BUILDING = 'building';

    /** филиал организации */
    public const TYPE_BRANCH = 'branch';

    /** административная единица */
    public const TYPE_ADM_DIV = 'adm_div';

    /** место */
    public const SUBTYPE_PLACE = 'place';

    /** остановка городского наземного транспорта */
    public const SUBTYPE_STOP = 'stop';

    /** железнодорожный вокзал */
    public const SUBTYPE_RAILWAY = 'railway';

    /** станция метро */
    public const SUBTYPE_METRO = 'metro';

    /** речной порт */
    public const SUBTYPE_RIVER_TRANSPORT = 'river_transport';

    /** троллейбус */
    public const SUBTYPE_TROLLEYBUS = 'trolleybus';

    /** трамвай */
    public const SUBTYPE_TRAM = 'tram';

    /** фуникулёр */
    public const SUBTYPE_FUNICULAR_RAILWAY = 'funicular_railway';

    /** монорельс */
    public const SUBTYPE_MONORAIL = 'monorail';

    /** канатная дорога */
    public const SUBTYPE_CABLE_CAR = 'cable_car';

    /** скоростной трамвай */
    public const SUBTYPE_LIGHT_RAIL = 'light_rail';

    /** метротрам */
    public const SUBTYPE_PREMETRO = 'premetro';

    /** лёгкое метро */
    public const SUBTYPE_LIGHT_METRO = 'light_metro';

    /**
     * @var string Уникальный идентификатор ориентира
     */
    public string $id;

    /**
     * @var string Тип объекта
     */
    public string $type;

    /**
     * @var string Подтип объекта. Для места — self::SUBTYPE_PLACE. Для остановочной платформы - self::SUBTYPE_*
     */
    public string $subtype;

    /**
     * @var string ID остановки для типов «остановочная платформа», «вход в метро»
     */
    public string $station_id;

    /**
     * @var string Название объекта
     */
    public string $name;

    /**
     * @var string Номер входа
     */
    public string $entrance_display_name;

    /**
     * @var string Расстояние от описываемого объекта до ближайшей остановочной платформы данной остановки в метрах
     */
    public string $distance;

    /**
     * @var int Азимут до объекта [0-360]
     */
    public int $azimuth;

    /**
     * Landmark constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->type = $data['type'];
        $this->subtype = $data['subtype'];
        $this->station_id = $data['station_id'];
        $this->name = $data['name'];
        $this->entrance_display_name = $data['entrance_display_name'];
        $this->distance = $data['distance'];
        $this->azimuth = $data['azimuth'];
    }
}

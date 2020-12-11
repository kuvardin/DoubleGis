<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Groups;

/**
 * Class Group
 *
 * @package Kuvardin\DoubleGis\Catalog\Groups
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Group
{
    /** филиал */
    public const TYPE_BRANCH = 'branch';

    /** здание */
    public const TYPE_BUILDING = 'building';

    /** достопримечательность */
    public const TYPE_ATTRACTION = 'attraction';

    /** административная территория */
    public const TYPE_ADM_DIV = 'adm_div';

    /** остановка */
    public const TYPE_STATION = 'station';

    /** остановочная платформа */
    public const TYPE_STATION_PLATFORM = 'station_platform';

    /** вход на станцию */
    public const TYPE_STATION_ENTRANCE = 'station_entrance';

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
     * @var string Идентификатор объекта
     */
    public string $id;

    /**
     * @var string|null Идентификатор организации
     */
    public ?string $org_id = null;

    /**
     * @var string|null Идентификатор рубрики
     */
    public ?string $rubric_id = null;

    /**
     * @var bool|null Признак того, что это главный объект в группе объектов гибрида
     */
    public ?bool $is_main_in_group = null;

    /**
     * @var string Тип объекта (must be self::TYPE_*)
     */
    public string $type;

    /**
     * @var string|null Подтип поглощенного объекта  (must be self::SUBTYPE_*)
     */
    public ?string $subtype;

    /**
     * Group constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->is_main_in_group = $data['is_main_in_group'] ?? null;
        $this->org_id = $data['org_id'] ?? null;
        $this->rubric_id = $data['rubric_id'] ?? null;
        $this->subtype = $data['subtype'] ?? null;
    }
}

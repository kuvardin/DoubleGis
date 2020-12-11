<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog;

use Error;

/**
 * Объект
 *
 * @package Kuvardin\DoubleGis
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
abstract class Item
{
    /** филиал */
    public const TYPE_BRANCH = 'branch';

    /** административная единица */
    public const TYPE_ADM_DIV = 'adm_div';

    /** здание */
    public const TYPE_BUILDING = 'building';

    /** улица */
    public const TYPE_STREET = 'street';

    /** достопримечательность */
    public const TYPE_ATTRACTION = 'attraction';

    /** перекресток */
    public const TYPE_CROSSROAD = 'crossroad';

    /** парковка */
    public const TYPE_PARKING = 'parking';

    /** дорога */
    public const TYPE_ROAD = 'road';

    /** проход/проезд */
    public const TYPE_GATE = 'gate';

    /** маршрут */
    public const TYPE_ROUTE = 'route';

    /** остановка */
    public const TYPE_STATION = 'station';

    /** остановочная платформа */
    public const TYPE_STATION_PLATFORM = 'station_platform';

    /** вход на станцию */
    public const TYPE_STATION_ENTRANCE = 'station_entrance';

    /** проект */
    public const TYPE_PROJECT = 'project';

    /** глобальная координата */
    public const TYPE_COORDINATES = 'coordinates';

    /** все типы */
    public const TYPE_ALL = [
        self::TYPE_BRANCH,
        self::TYPE_ADM_DIV,
        self::TYPE_BUILDING,
        self::TYPE_STREET,
        self::TYPE_ATTRACTION,
        self::TYPE_CROSSROAD,
        self::TYPE_PARKING,
        self::TYPE_ROAD,
        self::TYPE_GATE,
        self::TYPE_ROUTE,
        self::TYPE_STATION,
        self::TYPE_STATION_PLATFORM,
        self::TYPE_STATION_ENTRANCE,
        self::TYPE_ROAD,
        self::TYPE_PROJECT,
        self::TYPE_COORDINATES,
    ];

    /**
     * @var array
     */
    public array $raw_data;

    /**
     * Item constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->raw_data = $data;
        if ($data['type'] !== static::getType()) {
            throw new Error("Incorrect type {$data['type']}. Must be " . static::getType());
        }
    }

    /**
     * @return string
     */
    abstract public static function getType(): string;

    /**
     * @param array $data
     * @return static
     */
    final public static function make(array $data): self
    {
        switch ($data['type']) {
            case Items\Branch::getType():
                return new Items\Branch($data);

            case Items\Building::getType():
                return new Items\Building($data);

            case Items\Street::getType():
                return new Items\Street($data);

            case Items\AdmDivision::getType():
                return new Items\AdmDivision($data);

            case Items\Attraction::getType():
                return new Items\Attraction($data);

            case Items\Crossroad::getType():
                return new Items\Crossroad($data);

            case Items\Parking::getType():
                return new Items\Parking($data);

            case Items\Road::getType():
                return new Items\Road($data);

            case Items\Gate::getType():
                return new Items\Gate($data);

            case Items\Route::getType():
                return new Items\Route($data);

            case Items\Station::getType():
                return new Items\Station($data);

            case Items\StationPlatform::getType():
                return new Items\StationPlatform($data);

            case Items\StationEntrance::getType():
                return new Items\StationEntrance($data);

            case Items\Project::getType():
                return new Items\Project($data);
        }

        throw new Error("Unknown catalog item type: {$data['type']}");
    }

    /**
     * @param string $type
     * @return bool
     */
    public static function checkType(string $type): bool
    {
        return in_array($type, self::TYPE_ALL, true);
    }
}

<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Links;

use Kuvardin\DoubleGis\Catalog\Items\Building\Attraction;
use Kuvardin\DoubleGis\Catalog\Links\Servicing\Servicing;
use Kuvardin\DoubleGis\Catalog\Links\ShortTypes\Branches;
use Kuvardin\DoubleGis\Catalog\Links\ShortTypes\BranchesShort;
use Kuvardin\DoubleGis\Catalog\Links\ShortTypes\DatabaseEntrance;
use Kuvardin\DoubleGis\Catalog\Links\ShortTypes\Entrance;
use Kuvardin\DoubleGis\Catalog\Links\ShortTypes\Landmark;
use Kuvardin\DoubleGis\Catalog\Links\ShortTypes\NearestParking;
use Kuvardin\DoubleGis\Catalog\Links\ShortTypes\NearestStation;
use Kuvardin\DoubleGis\Catalog\Links\ShortTypes\Parking;

/**
 * Class Links
 *
 * @package Kuvardin\DoubleGis\Catalog\Links
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Links
{
    /**
     * @var Entrance[]|null Точки входа
     */
    public ?array $entrances = null;

    /**
     * @var DatabaseEntrance[]|null
     */
    public ?array $database_entrances = null;

    /**
     * @var Branches|null Организации
     */
    public ?Branches $branches = null;

    /**
     * @var Servicing|null Обслуживающие организации
     */
    public ?Servicing $servicing = null;

    /**
     * @var Branches|null Провайдеры
     */
    public ?Branches $providers = null;

    /**
     * @var BranchesShort|null Аэропорты
     */
    public ?BranchesShort $airports = null;

    /**
     * @var Parking[]|null Парковки
     */
    public ?array $parking = null;

    /**
     * @var NearestParking[]|null Ближайшие парковки
     */
    public ?array $nearest_parking = null;

    /**
     * @var NearestStation[]|null Ближайшие остановки
     */
    public ?array $nearest_stations = null;

    /**
     * @var BranchesShort|null Железнодорожные вокзалы
     */
    public ?BranchesShort $railway_terminals = null;

    /**
     * @var BranchesShort|null Автовокзалы
     */
    public ?BranchesShort $bus_terminals = null;

    /**
     * @var BranchesShort|null Отели
     */
    public ?BranchesShort $hotels = null;

    /**
     * @var BranchesShort|null Речные порты
     */
    public ?BranchesShort $river_ports = null;

    /**
     * @var BranchesShort|null Морские порты
     */
    public ?BranchesShort $seaports = null;

    /**
     * @var Attraction[]|null Достопримечательности
     */
    public ?array $attractions = null;

    /**
     * @var Landmark[]|null Ориентиры
     */
    public ?array $landmarks = null;

    /**
     * Links constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data['entrances'])) {
            $this->entrances = [];
            foreach ($data['entrances'] as $entrance_data) {
                $this->entrances[] = new Entrance($entrance_data);
            }
        }

        if (isset($data['database_entrances'])) {
            $this->database_entrances = [];
            foreach ($data['database_entrances'] as $database_entrance_data) {
                $this->database_entrances[] = new DatabaseEntrance($database_entrance_data);
            }
        }

        $this->branches = isset($data['branches']) ? new Branches($data['branches']) : null;
        $this->servicing = isset($data['servicing']) ? new Branches($data['servicing']) : null;
        $this->providers = isset($data['providers']) ? new Branches($data['providers']) : null;
        $this->airports = isset($data['airports']) ? new BranchesShort($data['airports']) : null;

        if (isset($data['parking'])) {
            $this->parking = [];
            foreach ($data['parking'] as $parking_data) {
                $this->parking[] = new Parking($parking_data);
            }
        }

        if (isset($data['nearest_parking'])) {
            $this->nearest_parking = [];
            foreach ($data['nearest_parking'] as $nearest_parking_data) {
                $this->nearest_parking[] = new NearestParking($nearest_parking_data);
            }
        }

        if (isset($data['nearest_stations'])) {
            $this->nearest_stations = [];
            foreach ($data['nearest_stations'] as $nearest_station_data) {
                $this->nearest_stations[] = new NearestStation($nearest_station_data);
            }
        }

        $this->railway_terminals = isset($data['railway_terminals'])
            ? new BranchesShort($data['railway_terminals'])
            : null;

        $this->bus_terminals = isset($data['bus_terminals'])
            ? new BranchesShort($data['bus_terminals'])
            : null;

        $this->hotels = isset($data['hotels'])
            ? new BranchesShort($data['hotels'])
            : null;

        $this->river_ports = isset($data['river_ports'])
            ? new BranchesShort($data['river_ports'])
            : null;

        $this->seaports = isset($data['seaports'])
            ? new BranchesShort($data['seaports'])
            : null;

        if (isset($data['attractions'])) {
            $this->attractions = [];
            foreach ($data['attractions'] as $attraction_data) {
                $this->attractions[] = new Attraction($attraction_data);
            }
        }

        if (isset($data['landmarks'])) {
            $this->landmarks = [];
            foreach ($data['landmarks'] as $landmark_data) {
                $this->landmarks[] = new Landmark($landmark_data);
            }
        }
    }
}

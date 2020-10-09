<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog;

use Error;
use Kuvardin\DoubleGis\Catalog\Address\Address;
use Kuvardin\DoubleGis\Catalog\AdmDivision\AdmDivision;
use Kuvardin\DoubleGis\Suggests\Group;

/**
 * Class Suggest
 *
 * @package Kuvardin\DoubleGis
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Suggest
{
    public const TYPE_ADM_DIV_REGION = 'adm_div.region';
    public const TYPE_ADM_DIV_DISTRICT_AREA = 'adm_div.district_area';
    public const TYPE_ADM_DIV_CITY = 'adm_div.city';
    public const TYPE_ADM_DIV_SETTLEMENT = 'adm_div.settlement';
    public const TYPE_ADM_DIV_DISTRICT = 'adm_div.district';
    public const TYPE_ADM_DIV_LIVING_AREA = 'adm_div.living_area';
    public const TYPE_ADM_DIV_DIVISION = 'adm_div.division';
    public const TYPE_ADM_DIV_PLACE = 'adm_div.place';
    public const TYPE_STREET = 'street';
    public const TYPE_BRANCH = 'branch';
    public const TYPE_BUILDING = 'building';
    public const TYPE_ROAD = 'road';
    public const TYPE_ATTRACTION = 'attraction';
    public const TYPE_CROSSROAD = 'crossroad';
    public const TYPE_ROUTE = 'route';
    public const TYPE_ROUTE_TYPE = 'route_type';
    public const TYPE_STATION = 'station';
    public const TYPE_STATION_METRO = 'station.metro';
    public const TYPE_USER_QUERIES = 'user_queries';
    public const TYPE_ATTRIBUTE = 'attribute';
    public const TYPE_RUBRIC = 'rubric';
    public const TYPE_META_RUBRIC = 'meta_rubric';
    public const TYPE_ORG = 'org';
    public const TYPE_MARKET_CATEGORY = 'market.category';
    public const TYPE_MARKET_ATTRIBUTE = 'market.attribute';
    public const TYPE_MARKET_SUGGESTOR_CATEGORY = 'market.suggestor_category';

    /**
     * @var int|null Optional
     */
    public ?int $branch_count;

    /**
     * @var int|null Optional
     */
    public ?int $id;

    /**
     * @var string
     */
    public string $locale;

    /**
     * @var string|null Optional
     */
    public ?string $name;

    /**
     * @var int
     */
    public int $region_id;

    /**
     * @var SearchAttributes
     */
    public SearchAttributes $search_attributes;

    /**
     * @var int
     */
    public int $segment_id;

    /**
     * @var string
     */
    public string $type;

    /**
     * @var AdmDivision[] Optional
     */
    public array $adm_div;

    /**
     * @var string|null Optional
     */
    public ?string $full_name;

    /**
     * @var Address|null Optional
     */
    public ?Address $address;

    /**
     * @var string|null Optional
     */
    public ?string $address_name;

    /**
     * @var string|null Optional
     */
    public ?string $building_name;

    /**
     * @var Suggest\Flags|null Optional
     */
    public ?Suggest\Flags $flags;

    /**
     * @var Group[] Optional
     */
    public array $groups;

    /**
     * Suggest constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->branch_count = $data['branch_count'] ?? null;
        $this->id = $data['id'] ?? null;
        $this->locale = $data['locale'];
        $this->name = $data['name'];
        $this->region_id = $data['region_id'];
        $this->search_attributes = new SearchAttributes($data['search_attributes']);
        $this->segment_id = $data['segment_id'];

        $this->type = $data['type'];
        if (!self::checkType($this->type)) {
            throw new Error("Unknown suggest type: {$this->type}");
        }

        $this->adm_div = [];
        if (!empty($data['adm_div'])) {
            foreach ($data['adm_div'] as $amd_division_data) {
                $this->adm_div[] = new AdmDivision($amd_division_data);
            }
        }

        $this->full_name = $data['full_name'] ?? null;
        $this->address = empty($data['address']) ? null : new Address($data['address']);
        $this->address_name = $data['address_name'] ?? null;
        $this->building_name = $data['building_name'] ?? null;
        $this->flags = isset($data['flags']) ? new Suggest\Flags($data['flags']) : null;
        $this->groups = array_map(static fn($group_data) => new Group($group_data), $data['group']);
    }

    /**
     * @param string $type
     * @return bool
     */
    public static function checkType(string $type): bool
    {
        return $type === self::TYPE_ADM_DIV_REGION ||
            $type === self::TYPE_ADM_DIV_DISTRICT_AREA ||
            $type === self::TYPE_ADM_DIV_CITY ||
            $type === self::TYPE_ADM_DIV_SETTLEMENT ||
            $type === self::TYPE_ADM_DIV_DISTRICT ||
            $type === self::TYPE_ADM_DIV_LIVING_AREA ||
            $type === self::TYPE_ADM_DIV_DIVISION ||
            $type === self::TYPE_ADM_DIV_PLACE ||
            $type === self::TYPE_STREET ||
            $type === self::TYPE_BRANCH ||
            $type === self::TYPE_BUILDING ||
            $type === self::TYPE_ROAD ||
            $type === self::TYPE_ATTRACTION ||
            $type === self::TYPE_CROSSROAD ||
            $type === self::TYPE_ROUTE ||
            $type === self::TYPE_ROUTE_TYPE ||
            $type === self::TYPE_STATION ||
            $type === self::TYPE_STATION_METRO ||
            $type === self::TYPE_USER_QUERIES ||
            $type === self::TYPE_ATTRIBUTE ||
            $type === self::TYPE_RUBRIC ||
            $type === self::TYPE_META_RUBRIC ||
            $type === self::TYPE_ORG ||
            $type === self::TYPE_MARKET_CATEGORY ||
            $type === self::TYPE_MARKET_ATTRIBUTE ||
            $type === self::TYPE_MARKET_SUGGESTOR_CATEGORY;
    }
}

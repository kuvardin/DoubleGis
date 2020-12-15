<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items\AdmDivision;

/**
 * Class Types
 *
 * @package Kuvardin\DoubleGis\Catalog\Items\AdmDivision
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Types
{
    /** город */
    public const CITY = 'city';

    /** населённый пункт */
    public const SETTLEMENT = 'settlement';

    /** округ */
    public const DIVISION = 'division';

    /** район */
    public const DISTRICT = 'district';

    /** жилмассив, микрорайон */
    public const LIVING_AREA = 'living_area';

    /** место */
    public const PLACE = 'place';

    /** район области */
    public const DISTRICT_AREA = 'district_area';

    /** регион (область/край/республика и т.п.) */
    public const REGION = 'region';

    /** все типы */
    public const ALL = [
        self::CITY,
        self::SETTLEMENT,
        self::DIVISION,
        self::DISTRICT,
        self::LIVING_AREA,
        self::PLACE,
        self::DISTRICT_AREA,
        self::REGION,
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
        return in_array($type, self::ALL, true);
    }
}

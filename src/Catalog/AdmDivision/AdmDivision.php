<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\AdmDivision;

use Error;

/**
 * Административная территория
 *
 * @package Kuvardin\DoubleGis
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class AdmDivision
{
    /** город */
    public const TYPE_CITY = 'city';

    /** населённый пункт */
    public const TYPE_SETTLEMENT = 'settlement';

    /** округ */
    public const TYPE_DIVISION = 'division';

    /** район */
    public const TYPE_DISTRICT = 'district';

    /** жилмассив, микрорайон */
    public const TYPE_LIVING_AREA = 'living_area';

    /** место */
    public const TYPE_PLACE = 'place';

    /** район области */
    public const TYPE_DISTRICT_AREA = 'district_area';

    /** регион (область/край/республика и т.п.) */
    public const TYPE_REGION = 'region';

    /**
     * @var string|null Идентификатор объекта административной единицы
     */
    public ?string $id;

    /**
     * @var string Идентификатор объекта административной единицы
     */
    public string $type;

    /**
     * @var string|null Название территории
     * (для использования в функционале «поделиться», для конечных точек маршрута и т.д.)
     */
    public ?string $caption;

    /**
     * @var string Имя объекта
     */
    public string $name;

    /**
     * @var bool|null Заполняется только для type=city и принимает единственное значение true в случае,
     * если город является главным городом текущего проекта (например Новосибирск).
     */
    public ?bool $is_default;

    /**
     * @var Flags|null Список признаков объекта
     */
    public ?Flags $flags;

    /**
     * @var string|null Алиас населенного пункта
     */
    public ?string $city_alias;

    /**
     * AdmDivision constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->type = $data['type'];

        if (!self::checkType($this->type)) {
            throw new Error("Unknown adm division type: {$this->type}");
        }

        $this->caption = $data['caption'] ?? null;
        $this->name = $data['name'];
        $this->is_default = $data['is_default'] ?? null;
        $this->flags = isset($data['flags']) ? new Flags($data['flags']) : null;
        $this->city_alias = $data['city_alias'] ?? null;
    }

    /**
     * @param string $type
     * @return bool
     */
    public static function checkType(string $type): bool
    {
        return $type === self::TYPE_REGION ||
        $type === self::TYPE_DISTRICT_AREA ||
        $type === self::TYPE_CITY ||
        $type === self::TYPE_DISTRICT ||
        $type === self::TYPE_DIVISION ||
        $type === self::TYPE_PLACE ||
        $type === self::TYPE_LIVING_AREA ||
        $type === self::TYPE_SETTLEMENT;
    }
}

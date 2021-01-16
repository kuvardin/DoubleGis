<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog;

use Kuvardin\DoubleGis\Catalog\Badge;

/**
 * Список признаков объекта
 *
 * @package Kuvardin\DoubleGis\Catalog
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Flags
{
    public const CLOSURE_REASON_COVID19 = 'covid19';
    public const CLOSURE_REASON_UNKNOWN = 'unknown';
    public const CLOSURE_REASON_OPENING_SOON = 'opening_soon';

    /**
     * @var bool|null Есть ли для объекта фотографии
     */
    public ?bool $photos;

    /**
     * @var Badge[] Список бейджей
     */
    public array $badges = [];

    /**
     * @var bool|null Заполняется только для type=city и принимает единственное значение true в случае,
     * если город является главным городом текущего проекта (например Новосибирск)
     */
    public ?bool $is_default;

    /**
     * @var bool|null Заполняется только для type=adm_div, subtype=city|settlement и принимает единственное значение
     * true в случае, если населённый пункт является областным центром
     */
    public ?bool $is_region_center;

    /**
     * @var bool|null Заполняется только для type=adm_div, subtype=city|settlement и принимает единственное значение
     * true в случае, если населённый пункт является районным центром
     */
    public ?bool $is_district_area_center;

    /**
     * @var string|null Строка, наличие которой говорит о том, что филиал временно не работает.
     * В строке выгружается код причины закрытия. (self::CLOSURE_REASON_*)
     */
    public ?string $temporary_closed;

//     TODO: public array $temporary_closed_parameters;

    /**
     * Flags constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->photos = $data['photos'] ?? null;

        if (isset($data['badges'])) {
            $this->badges = array_map(static fn($badge_data) => new Badge($badge_data), $data['badges']);
        }

        $this->is_default = $data['is_default'];
        $this->is_region_center = $data['is_region_center'] ?? null;
        $this->is_district_area_center = $data['is_district_area_center'] ?? null;
        $this->temporary_closed = $data['temporary_closed'] ?? null;
//        $this->temporary_closed_parameters = $data['temporary_closed_parameters'];
    }
}

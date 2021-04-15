<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Links\ShortTypes\DatabaseEntrance;

/**
 * Class ApartmentsInfo
 *
 * @package Kuvardin\DoubleGis\Catalog\Links\ShortTypes\DatabaseEntrance
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class ApartmentsInfo
{
    /**
     * @var bool true, если распределение квартир по этажам было произведено автоматически
     */
    public bool $calculated;

    /**
     * @var Floors Информация о распределении квартир по этажам
     */
    public Floors $floors;

    /**
     * @var string|null Номер дома, к которому относится вход.
     * Выгружается только в случае, когда подъезды имеют свои отдельные адреса
     */
    public ?string $building_number;

    /**
     * ApartmentsInfo constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->calculated = $data['calculated'];
        $this->floors = new Floors($data['floors']);
        $this->building_number = $data['building_number'] ?? null;
    }
}

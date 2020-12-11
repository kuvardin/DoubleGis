<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Links\ShortTypes\DatabaseEntrance;

/**
 * Квартиры
 *
 * @package Kuvardin\DoubleGis\Catalog\Links\ShortTypes\DatabaseEntrance
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Apartments
{
    /**
     * @var int Номер первой квартиры диапазона
     */
    public int $start;

    /**
     * @var int Номер последней квартиры диапазона
     */
    public int $end;

    /**
     * @var int Положительное значение шага изменения номера, по умолчанию 1
     */
    public int $step;

    /**
     * Apartments constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->start = $data['start'];
        $this->end = $data['end'];
        $this->step = $data['step'];
    }
}

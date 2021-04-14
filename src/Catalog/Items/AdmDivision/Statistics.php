<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items\AdmDivision;

use Error;

/**
 * Сводная информация об административной единице.
 *
 * @package Kuvardin\DoubleGis\Catalog\Items\AdmDivision
 */
class Statistics
{
    /**
     * @var float|null Площадь объекта, км². $area > 0
     */
    public ?float $area;

    /**
     * @var float|null Длина объекта, км. $length > 0
     */
    public ?float $length;

    /**
     * @var int|null Количество домов, относящихся к объекту. $building_count > 0
     */
    public ?int $building_count;

    /**
     * @var int|null Количество филиалов, относящихся к объекту. $filials_count > 1
     */
    public ?int $filials_count;

    /**
     * Statistics constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->area = $data['area'] ?? null;
        $this->length = $data['length'] ?? null;
        $this->building_count = $data['building_count'] ?? null;
        $this->filials_count = $data['filials_count'] ?? null;
    }
}
<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items\Building\Floors;

/**
 * Количество этажей
 *
 * @package Kuvardin\DoubleGis\Catalog\Items\Building\Floors
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Floors
{
    /**
     * @var int|null int >= 1
     */
    public ?int $ground_min_count;

    /**
     * @var int int >= 1
     */
    public int $ground_count;

    /**
     * @var int|null int >= 1
     */
    public ?int $underground_count;

    /**
     * Floors constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->ground_min_count = $data['ground_min_count'] ?? null;
        $this->ground_count = $data['ground_count'];
        $this->underground_count = $data['underground_count'] ?? null;
    }
}

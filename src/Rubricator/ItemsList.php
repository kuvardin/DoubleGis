<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Rubricator;

/**
 * Class ItemsList
 *
 * @package Kuvardin\DoubleGis\Rubricator
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class ItemsList
{
    /**
     * @var int Количество найденных объектов
     */
    public int $total;

    /**
     * @var Items\Item[] Массив найденных объектов
     */
    public array $items;

    /**
     * ItemsList constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->total = $data['total'];
        $this->items = array_map(static fn($item_data) => Items\Item::make($item_data), $data['items']);
    }
}

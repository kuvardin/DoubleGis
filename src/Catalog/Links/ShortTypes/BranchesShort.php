<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Links\ShortTypes;

use Kuvardin\DoubleGis\Catalog\Links\ShortTypes\BranchesShort\BranchShort;

/**
 * Class BranchesShort
 *
 * @package Kuvardin\DoubleGis\Catalog\Links\ShortTypes
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class BranchesShort
{
    /**
     * @var int Количество объектов
     */
    public int $count;

    /**
     * @var BranchShort[]|null Объекты
     */
    public ?array $items = null;

    /**
     * BranchesShort constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->count = $data['count'];
        if (isset($data['items'])) {
            $this->items = [];
            foreach ($data['items'] as $item_data) {
                $this->items[] = new BranchShort($item_data);
            }
        }
    }
}

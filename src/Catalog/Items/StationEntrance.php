<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items;

use Kuvardin\DoubleGis\Catalog\Item;

/**
 * Class StationEntrance
 *
 * @package Kuvardin\DoubleGis\Catalog\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class StationEntrance extends Item
{
    public function __construct(array $data)
    {
        parent::__construct($data);
    }
4
    /**
     * @return string
     */
    public static function getType(): string
    {
        return Item::TYPE_STATION_ENTRANCE;
    }
}

<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items;

use Kuvardin\DoubleGis\Catalog\Item;
use Kuvardin\DoubleGis\Traits\LongId;

/**
 * Class AdmDivision
 *
 * @package Kuvardin\DoubleGis\Catalog\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class AdmDivision extends Item
{
    use LongId;

    /**
     * @var string Идентификатор региона
     */
    public string $region_id;

    /**
     * @var string Уникальный идентификатор сегмента
     */
    public string $segment_id;

    /**
     * @var string Подтип административной единицы
     */
    public string $subtype;




    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->setId($data['id']);

    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Item::TYPE_ADM_DIV;
    }


}

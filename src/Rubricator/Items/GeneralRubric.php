<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Rubricator\Items;

/**
 * Class GeneralRubric
 *
 * @package Kuvardin\DoubleGis\Rubricator\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class GeneralRubric extends Item
{


    public function __construct(array $data)
    {
        parent::__construct($data);
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Item::TYPE_GENERAL_RUBRIC;
    }
}

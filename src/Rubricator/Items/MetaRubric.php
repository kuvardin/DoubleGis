<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Rubricator\Items;

/**
 * Class MetaRubric
 *
 * @package Kuvardin\DoubleGis\Rubricator\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class MetaRubric extends Item
{

    /**
     * MetaRubric constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Item::TYPE_META_RUBRIC;
    }
}

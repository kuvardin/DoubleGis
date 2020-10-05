<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Rubricator\Items;

use Error;

/**
 * Class Item
 *
 * @package Kuvardin\DoubleGis\Rubricator\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
abstract class Item
{
    /** категория */
    public const TYPE_RUBRIC = 'rubric';

    /** псевдорубрика */
    public const TYPE_PSEUDO_RUBRIC = 'pseudorubric';

    /** метакатегория */
    public const TYPE_META_RUBRIC = 'metarubric';

    /** объединяющая рубрика */
    public const TYPE_GENERAL_RUBRIC = 'general_rubric';

    /** рубрика для владельца РМ «Здесь можно купить» */
    public const TYPE_OWNED_RUBRIC = 'owned_rubric';

    /** все типы */
    public const TYPE_ALL = [
        self::TYPE_RUBRIC,
        self::TYPE_PSEUDO_RUBRIC,
        self::TYPE_META_RUBRIC,
    ];

    /**
     * Item constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        if ($data['type'] !== static::getType()) {
            throw new Error("Incorrect type: {$data['type']}");
        }
    }

    /**
     * @return string
     */
    abstract public static function getType(): string;

    /**
     * @param array $data
     * @return static
     */
    public static function make(array $data): self
    {
        switch ($data['type']) {
            case self::TYPE_RUBRIC:
                return new Rubric($data);

            case self::TYPE_PSEUDO_RUBRIC:
                return new PseudoRubric($data);

            case self::TYPE_META_RUBRIC:
                return new MetaRubric($data);

            case self::TYPE_GENERAL_RUBRIC:


            default:
                throw new Error("Unknown item type: {$data['type']}");
        }
    }
}

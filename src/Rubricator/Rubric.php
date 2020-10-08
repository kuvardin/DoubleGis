<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Rubricator;

use Error;

/**
 * Class Rubric
 *
 * @package Kuvardin\DoubleGis\Rubricator
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
abstract class Rubric
{
    /** категория */
    public const TYPE_SIMPLE_RUBRIC = 'rubric';

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
        self::TYPE_SIMPLE_RUBRIC,
        self::TYPE_PSEUDO_RUBRIC,
        self::TYPE_META_RUBRIC,
    ];

    /**
     * @var string|null Короткая подпись к иконке
     */
    public ?string $caption;

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
        $this->caption = $data['caption'] === '' ? null : $data['caption'];
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
            case self::TYPE_SIMPLE_RUBRIC:
                return new Rubrics\SimpleRubric($data);

            case self::TYPE_PSEUDO_RUBRIC:
                return new Rubrics\PseudoRubric($data);

            case self::TYPE_META_RUBRIC:
                return new Rubrics\MetaRubric($data);

            case self::TYPE_GENERAL_RUBRIC:
                return new Rubrics\GeneralRubric($data);

            case self::TYPE_OWNED_RUBRIC:
                return new Rubrics\OwnedRubric($data);

            default:
                throw new Error("Unknown item type: {$data['type']}");
        }
    }
}

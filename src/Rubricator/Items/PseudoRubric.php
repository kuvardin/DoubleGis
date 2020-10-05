<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Rubricator\Items;

/**
 * Псевдорубрика
 *
 * @package Kuvardin\DoubleGis\Rubricator\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class PseudoRubric extends Item
{
    /**
     * @var string Заголовок рубрики
     */
    public string $title;

    /**
     * @var string Короткая подпись к иконке
     */
    public string $caption;

    /**
     * PseudoRubric constructor.
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
        return Item::TYPE_PSEUDO_RUBRIC;
    }
}

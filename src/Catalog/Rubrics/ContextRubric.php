<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Rubrics;

/**
 * Контекстная категория
 *
 * @package Kuvardin\DoubleGis\Rubrics
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class ContextRubric
{
    /**
     * @var string Идентификатор рубрики
     */
    public string $id;

    /**
     * @var int Короткий идентификатор рубрики
     */
    public int $short_id;

    /**
     * @var string Название рубрики
     */
    public string $name;

    /**
     * @var int Значение группы, полученное из Sapphire
     */
    public int $group;

    /**
     * @var string Название рубрики
     */
    public string $caption;

    /**
     * ContextRubric constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->short_id = $data['short_id'];
        $this->name = $data['name'];
        $this->group = $data['group'];
    }
}

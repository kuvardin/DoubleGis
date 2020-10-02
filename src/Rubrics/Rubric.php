<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Rubrics;

use Error;

/**
 * Рубрика
 *
 * @package Kuvardin\DoubleGis\Rubrics
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Rubric
{
    /** основная */
    public const KIND_PRIMARY = 'primary';

    /** дополнительная */
    public const KIND_ADDITIONAL = 'additional';

    /**
     * @var string|null Уникальный идентификатор рубрики
     */
    public ?string $id;

    /**
     * @var int Короткий идентификатор рубрики
     */
    public int $short_id;

    /**
     * @var string Собственное имя рубрики
     */
    public string $name;

    /**
     * @var string Транслированное название страницы в web
     */
    public string $alias;

    /**
     * @var string Идентификатор объединяющей рубрики
     */
    public string $parent_id;

    /**
     * @var string Тип рубрики (self::KIND_*)
     */
    public string $kind;

    /**
     * Rubric constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->short_id = $data['short_id'];
        $this->name = $data['name'];
        $this->alias = $data['alias'];
        $this->parent_id = $data['parent_id'];
        $this->kind = $data['kind'];

        if (!self::checkKind($this->kind)) {
            throw new Error("Unknown rubric kind: {$this->kind}");
        }
    }

    /**
     * @param string $kind
     * @return bool
     */
    public static function checkKind(string $kind): bool
    {
        return $kind === self::KIND_PRIMARY ||
            $kind === self::KIND_ADDITIONAL;
    }
}

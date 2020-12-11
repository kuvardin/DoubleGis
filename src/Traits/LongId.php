<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Traits;

use Error;

/**
 * Trait LongId
 *
 * @package Kuvardin\DoubleGis\Traits
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
trait LongId
{
    /**
     * @var string Уникальный идентификатор объекта
     */
    public string $id;

    /**
     * @var string Полный идентификатор объекта
     */
    public string $id_full;

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        if (!preg_match('|^(\d+)_[a-zA-Z0-9]+$|', $id, $match)) {
            throw new Error("Incorrect ID: $id");
        }
        $this->id = $match[1];
        $this->id_full = $id;
    }
}

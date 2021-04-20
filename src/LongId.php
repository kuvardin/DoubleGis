<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis;

use Error;

/**
 * Class LongId
 *
 * @package Kuvardin\DoubleGis
 */
class LongId
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
     * LongId constructor.
     *
     * @param string $id
     */
    public function __construct(string $id)
    {
        if (!preg_match('|^([1-9]{1}[0-9]*)(_([a-zA-Z0-9]+))?$|', $id, $match)) {
            throw new Error("Incorrect ID: $id");
        }

        $this->id = $match[1];
        $this->id_full = $id;
    }
}
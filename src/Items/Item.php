<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Items;

use Error;
use Kuvardin\DoubleGis\Items\Branch;

/**
 * Объект
 *
 * @package Kuvardin\DoubleGis
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
abstract class Item
{
    /**
     * @var string
     */
    public string $type;

    /**
     * Item constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        if ($data['type'] !== static::getType()) {
            throw new Error("Incorrect type {$data['type']}. Must be " . static::getType());
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
    final public static function make(array $data): ?self
    {
        switch ($data['type']) {
            case Branch::getType():
                return new Branch($data);
        }
        return null;
    }
}

<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Address;

use Error;

/**
 * Компонент адреса
 *
 * @package Kuvardin\DoubleGis\Address
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
abstract class Component
{
    /** типичный адрес */
    public const TYPE_STREET_NUMBER = 'street_number';

    /** только номер дома */
    public const TYPE_NUMBER = 'number';

    /** универсальное описание */
    public const TYPE_LOCATION = 'location';

    /**
     * Component constructor.
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
     * Returns one of self::TYPE_*
     * @return string
     */
    abstract public static function getType(): string;

    /**
     * @param array $data
     * @return static
     */
    final public static function make(array $data): self
    {
        switch ($data['type']) {
            case Components\StreetNumber::getType():
                return new Components\StreetNumber($data);

            case Components\Number::getType():
                return new Components\Number($data);

            case Components\Location::getType():
                return new Components\Location($data);

            default:
                throw new Error("Unknown address component type: {$data['type']}");
        }
    }
}

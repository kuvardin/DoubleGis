<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Suggests;

/**
 * Типы подсказки
 *
 * @package Kuvardin\DoubleGis\Suggest
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Types
{
    /** идеально подходит для быстрого поиска конечных объектов маршрута. Все результаты имеют id и координаты */
    public const ROUTE_ENDPOINT = 'route_endpoint';

    /** подсказка адресов */
    public const ADDRESS = 'address';

    /** подсказка по объектам справочника (категории, фирмы, улицы, города и т.д.) */
    public const OBJECT = 'object';

    /** подсказка улиц */
    public const STREET = 'street';

    /** подсказка категорий */
    public const RUBRIC = 'rubric';

    /** подсказка мест */
    public const PLACES = 'places';

    /** подсказка дополнительных атрибутов */
    public const ATTRIBUTE = 'attribute';

    /** подсказка адресов. Может использоваться без указания проекта */
    public const GLOBAL_ADDRESS = 'global_address';

    /** алиас default */
    public const GLOBAL = 'global';

    /** подсказка населённых пунктов. Может использоваться без указания проекта */
    public const CITY_SELECTOR = 'city_selector';

    /** используемый по умолчанию */
    public const DEFAULT = 'default';

    /** Все типы подсказок */
    public const ALL = [
        self::ROUTE_ENDPOINT,
        self::ADDRESS,
        self::OBJECT,
        self::STREET,
        self::RUBRIC,
        self::PLACES,
        self::ATTRIBUTE,
        self::GLOBAL_ADDRESS,
        self::GLOBAL,
        self::CITY_SELECTOR,
        self::DEFAULT,
    ];

    private function __construct() {}

    /**
     * @param string $type
     * @return bool
     */
    public static function check(string $type): bool
    {
        return in_array($type, self::ALL, true);
    }
}

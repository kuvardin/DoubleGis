<?php

declare(strict_types=1);

namespace Search;

/**
 * Типы производимого поиска
 *
 * @package Search
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Types
{
    /** максимально широкий поиск с возможностью раскрытия связанных объектов
     * (категории, соответсвующие запросу, будут раскрыты до входящих в них компаний)
     */
    public const DISCOVERY = 'discovery';

    /** идентичен discovery, но для организации будет отдан только один филиал компании */
    public const ONE_BRANCH = 'one_branch';

    /** конфигурация для качественного поиска компаний в здании */
    public const INDOOR = 'indoor';

    /** идентичен discovery, но будут выданы только объекты с рекламой.
     * Кроме того, для организации будет отдан только один первый по ранжированию филиал компании
     */
    public const ADS = 'ads';

    /** идентичен discovery, но будет задействовано больше вариантов пересечений связей */
    public const DISCOVERY_PARTIAL_SEARCHER = 'discovery_partial_searcher';

    /** идентичен discovery_partial_searcher, но с выключенным префиксным поиском */
    public const DISCOVERY_PARTIAL_SEARCHER_STRICT = 'discovery_partial_searcher_strict';

    /** все типы */
    public const ALL = [
        self::DISCOVERY,
        self::ONE_BRANCH,
        self::INDOOR,
        self::ADS,
        self::DISCOVERY_PARTIAL_SEARCHER,
        self::DISCOVERY_PARTIAL_SEARCHER_STRICT,
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

<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog;

/**
 * Варианты сортировки
 *
 * @package Kuvardin\DoubleGis
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Sorts
{
    /** по возрастанию расстояния. Расстояние рассчитывается до центра площадных геообъектов (городов, районов и т.д.)
     * и по кратчайшему расстоянию до линейных (улиц). Если передан параметр sort_point, то расстояние рассчитывается
     * до этой точки
     */
    public const DISTANCE = 'distance';

    /** по убыванию релевантности. В поиске участвует название организации и категории, в которые входит организация */
    public const RELEVANCE = 'relevance';

    /** по убыванию рейтинга */
    public const RATING = 'rating';

    /** по убыванию рейтинга флампа */
    public const FLAMP_RATING = 'flamp_rating';

    /** по убыванию рейтинга (алиас rating) */
    public const GENERAL_RATING = 'general_rating';

    /** по возрастанию расстояния аналогично distance, но без учёта рекламных весов */
    public const DISTANCE_WITHOUT_ADS = 'distance_without_ads';

    /** по убыванию даты создания компании */
    public const CREATION_TIME = 'creation_time';

    /** по убыванию даты открытия */
    public const OPENED_TIME = 'opened_time';

    /** все варианты */
    public const ALL = [
        self::DISTANCE,
        self::RELEVANCE,
        self::RATING,
        self::FLAMP_RATING,
        self::GENERAL_RATING,
        self::DISTANCE_WITHOUT_ADS,
        self::CREATION_TIME,
        self::OPENED_TIME,
    ];

    private function __construct() {}

    /**
     * @param string $sort
     * @return bool
     */
    public static function check(string $sort): bool
    {
        return in_array($sort, self::ALL, true);
    }
}

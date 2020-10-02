<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis;

/**
 * Локаль, с которой производится поиск и отдаются результаты.
 *
 * @package Kuvardin\DoubleGis
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Locales
{
    /** русский (Россия) */
    public const RU_RU = 'ru_RU';

    /** русский (Украина) */
    public const RU_UA = 'ru_UA';

    /** русский (Казахстан) */
    public const RU_KG = 'ru_KG';

    /** русский (Киргизия) */
    public const RU_KZ = 'ru_KZ';

    /** русский (Узбекистан) */
    public const RU_UZ = 'ru_UZ';

    /** украинский (Россия) */
    public const UK_RU = 'uk_RU';

    /** украинский (Украина) */
    public const UK_UA = 'uk_UA';

    /** английский (Россия) */
    public const EN_RU = 'en_RU';

    /** английский (ОАЭ) */
    public const EN_AE = 'en_AE';

    /** английский (Кипр) */
    public const EN_CY = 'en_CY';

    /** итальянский (Россия) */
    public const IT_RU = 'it_RU';

    /** итальянский (Италия) */
    public const IT_IT = 'it_IT';

    /** испанский (Россия) */
    public const ES_RU = 'es_RU';

    /** испанский (Кипр) */
    public const ES_CL = 'es_CL';

    /** арабский (ОАЭ) */
    public const AR_AE = 'ar_AE';

    /** арабский (Россия) */
    public const AR_RU = 'ar_RU';

    /** чешский (Чехия) */
    public const CS_CZ = 'cs_CZ';

    /** чешский (Россия) */
    public const CS_RU = 'cs_RU';

    /** азербайджанский (Азербайджан) */
    public const AZ_AZ = 'az_AZ';

    /** список всех локалей */
    public const ALL = [
        self::RU_RU,
        self::RU_UA,
        self::RU_KG,
        self::RU_KZ,
        self::RU_UZ,
        self::UK_RU,
        self::UK_UA,
        self::EN_RU,
        self::EN_AE,
        self::EN_CY,
        self::IT_RU,
        self::IT_IT,
        self::ES_RU,
        self::ES_CL,
        self::AR_AE,
        self::AR_RU,
        self::CS_CZ,
        self::CS_RU,
        self::AZ_AZ,
    ];

    private function __construct() {}

    /**
     * @param string $locale
     * @return bool
     */
    public static function check(string $locale): bool
    {
        return in_array($locale, self::ALL, true);
    }
}

<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis;

/**
 * Коды платформ
 *
 * @package Kuvardin\DoubleGis
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Platforms
{
    /** iOS */
    public const IOS = 'ios';

    /** Android */
    public const ANDROID = 'android';

    /** Online */
    public const ONLINE = 'online';

    /** Все платформы */
    public const ALL = [
        self::IOS,
        self::ANDROID,
        self::ONLINE,
    ];

    private function __construct() {}

    /**
     * @param string $platform
     * @return bool
     */
    public static function check(string $platform): bool
    {
        return in_array($platform, self::ALL, true);
    }
}

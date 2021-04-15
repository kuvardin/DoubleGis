<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog;

use Error;

/**
 * Внешний контент
 *
 * @package Kuvardin\DoubleGis\Catalog
 */
class ExternalContent
{
    public const SUBTYPE_COMMON = 'common';
    public const SUBTYPE_VIEW = 'view';
    public const SUBTYPE_FACILITIES = 'facilities';

    /** Список подтипов */
    public const SUBTYPES_ALL = [
        self::SUBTYPE_COMMON,
        self::SUBTYPE_VIEW,
        self::SUBTYPE_FACILITIES,
    ];

    /**
     * @var string Тип контента
     */
    public string $type;

    /**
     * @var string Код альбома (common, view, facilities)
     */
    public string $subtype;

    /**
     * @var int Количество фотографий в альбоме (integer > 1)
     */
    public int $count;

    /**
     * @var string URL первой фотографии альбома
     */
    public string $main_photo_url;

    /**
     * ExternalContent constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (!self::checkSubtype($data['subtype'])) {
            throw new Error("Unknown subtype: {$data['subtype']}");
        }

        $this->type = $data['type'];
        $this->subtype = $data['subtype'];
        $this->count = $data['count'];
        $this->main_photo_url = $data['main_photo_url'];
    }

    /**
     * @param string $subtype
     * @return bool
     */
    public static function checkSubtype(string $subtype): bool
    {
        return in_array($subtype, self::SUBTYPES_ALL, true);
    }
}
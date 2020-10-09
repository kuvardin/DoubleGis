<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Suggests;

use Error;

/**
 * Class Group
 *
 * @package Kuvardin\DoubleGis\Suggest
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Group
{
    public const TYPE_BUILDING = 'building';
    public const TYPE_STATION_PLATFORM = 'station_platform';
    public const TYPE_ATTRACTION = 'attraction';

    public const SUBTYPE_STOP = 'stop';

    /**
     * @var int Long int
     */
    public int $id;

    /**
     * @var string Must be self::TYPE_*
     */
    public string $type;

    /**
     * @var string|null Optional. Must be self::SUBTYPE_*
     */
    public ?string $subtype;

    /**
     * Group constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->type = $data['type'];

        if (!self::checkType($this->type)) {
            throw new Error("Unknown group type: {$this->type}");
        }

        $this->subtype = $data['subtype'] ?? null;

        if ($this->subtype !== null && !self::checkSubtype($data['subtype'])) {
            throw new Error("Unknown group subtype: {$this->subtype}");
        }
    }

    /**
     * @param string $type
     * @return bool
     */
    public static function checkType(string $type): bool
    {
        return $type === self::TYPE_BUILDING ||
            $type === self::TYPE_STATION_PLATFORM ||
            $type === self::TYPE_ATTRACTION;
    }

    /**
     * @param string $subtype
     * @return bool
     */
    public static function checkSubtype(string $subtype): bool
    {
        return $subtype === self::SUBTYPE_STOP;
    }
}

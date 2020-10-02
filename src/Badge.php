<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis;

use Error;

/**
 * Бейдж
 *
 * @package Kuvardin\DoubleGis\Suggest
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Badge
{
    public const TYPE_AWARD_2016 = 'award2016';
    public const TYPE_AWARD_2017 = 'award2017';
    public const TYPE_AWARD_2018 = 'award2018';
    public const TYPE_AWARD_2019 = 'award2019';

    /**
     * @var string Текст в бейдже
     */
    public string $text;

    /**
     * @var string Идентификатор подборки
     */
    public string $collection_uid;

    /**
     * @var string Тип бейджа (self::TYPE_*)
     */
    public string $type;

    /**
     * Badge constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->collection_uid = $data['collection_uid'];
        $this->text = $data['text'];
        $this->type = $data['type'];

        if (!self::checkType($this->type)) {
            throw new Error("Unknown badge type: {$this->type}");
        }
    }

    /**
     * @param string $type
     * @return bool
     */
    public static function checkType(string $type): bool
    {
        return $type === self::TYPE_AWARD_2016 ||
            $type === self::TYPE_AWARD_2017 ||
            $type === self::TYPE_AWARD_2018 ||
            $type === self::TYPE_AWARD_2019;
    }
}

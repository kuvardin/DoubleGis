<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Links\ShortTypes;

/**
 * Class Parking
 *
 * @package Kuvardin\DoubleGis\Catalog\Links\ShortTypes
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Parking
{
    /** для автомобилей */
    public const PURPOSE_CAR = 'car';

    /** для велосипедов */
    public const PURPOSE_BIKE = 'bike';

    /** для мотоциклов/мопедов */
    public const PURPOSE_MOTORBIKE = 'motorbike';

    /**
     * @var string|null Идентификатор отдельного объекта парковки, если есть
     */
    public ?string $id = null;

    /**
     * @var string Собственное название парковки
     */
    public string $name;

    /**
     * @var string Назначение парковки (must be self::PURPOSE_*)
     */
    public string $purpose;

    /**
     * @var string Вместимость парковки (количество машиномест)
     */
    public string $capacity;

    /**
     * @var bool Является ли парковка платной
     */
    public bool $is_paid;

    /**
     * @var string Дополнительное описание
     */
    public string $comment;

    /**
     * Parking constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'];
        $this->purpose = $data['purpose'];
        $this->capacity = $data['capacity'];
        $this->is_paid = $data['is_paid'];
        $this->comment = $data['comment'];
    }
}

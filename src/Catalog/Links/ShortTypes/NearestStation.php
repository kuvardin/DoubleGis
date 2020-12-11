<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Links\ShortTypes;

use Kuvardin\DoubleGis\Catalog\Links\ShortTypes\NearestStation\Entrance as NearestStationEntrance;

/**
 * Ближайшая остановка
 *
 * @package Kuvardin\DoubleGis\Catalog\Links\ShortTypes
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class NearestStation
{
    /**
     * @var string Уникальный идентификатор остановки
     */
    public string $id;

    /**
     * @var string Название остановки
     */
    public string $name;

    /**
     * @var string|null Дополнительный комментарий к названию остановки, например название линии (или линий) метро,
     * к которым относится станция
     */
    public ?string $comment;

    /**
     * @var string|null Присутствует, если применяется цветовое кодирование, например в случае станций метро
     */
    public ?string $color = null;

    /**
     * @var string|null Иконка метро
     */
    public ?string $route_logo;

    /**
     * @var string[] Массив типов транспорта, проходящего через эту остановку (Routes\RouteTypes::*)
     */
    public array $route_types;

    /**
     * @var int Расстояние от описываемого объекта до ближайшей остановочной платформы данной остановки в метрах
     */
    public int $distance;

    /**
     * @var bool|null Существует ли внутренний переход на эту станцию из описываемого объекта
     */
    public ?bool $internal_transition;

    /**
     * @var NearestStationEntrance|null Вход
     */
    public ?NearestStationEntrance $entrance;

    /**
     * NearestStation constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->comment = $data['comment'] ?? null;
        $this->color = $data['color'] ?? null;
        $this->route_logo = $data['route_logo'] ?? null;
        $this->route_types = $data['route_types'];
        $this->distance = $data['distance'];
        $this->internal_transition = $data['internal_transition'] ?? null;
        $this->entrance = isset($data['entrance']) ? new NearestStationEntrance($data['entrance']) : null;
    }
}

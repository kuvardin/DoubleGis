<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items\Building;

/**
 * Описание достопримечательности
 *
 * @package Kuvardin\DoubleGis\Catalog\Items\Building
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Attraction
{
    /**
     * @var string Уникальный идентификатор объекта достопримечательности
     */
    public string $id;

    /**
     * @var string Локализованное название типа достопримечательности
     */
    public string $subtype_name;

    /**
     * @var string Название достопримечательности
     */
    public string $name;

    /**
     * @var string|null Описание достопримечательности
     */
    public ?string $description;

    /**
     * @var string|null Дата или даты
     */
    public ?string $dates;

    /**
     * @var string|null Авторы
     */
    public ?string $authors;

    /**
     * Attraction constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->subtype_name = $data['subtype_name'];
        $this->name = $data['name'];
        $this->description = $data['description'] ?? null;
        $this->dates = $data['dates'] ?? null;
        $this->authors = $data['authors'] ?? null;
    }
}

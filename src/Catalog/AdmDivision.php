<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog;

use Error;
use Kuvardin\DoubleGis\Catalog\Items\AdmDivision\Types as AdmDivisionTypes;

/**
 * Административная территория
 *
 * @package Kuvardin\DoubleGis
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class AdmDivision
{
    /**
     * @var string|null Идентификатор объекта административной единицы
     */
    public ?string $id;

    /**
     * @var string Идентификатор объекта административной единицы (AdmDivision\Types::*)
     */
    public string $type;

    /**
     * @var string|null Название территории
     * (для использования в функционале «поделиться», для конечных точек маршрута и т.д.)
     */
    public ?string $caption;

    /**
     * @var string Имя объекта
     */
    public string $name;

    /**
     * @var bool|null Заполняется только для type=city и принимает единственное значение true в случае,
     * если город является главным городом текущего проекта (например Новосибирск).
     */
    public ?bool $is_default;

    /**
     * @var Flags|null Список признаков объекта
     */
    public ?Flags $flags;

    /**
     * @var string|null Алиас населенного пункта
     */
    public ?string $city_alias;

    /**
     * AdmDivision constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->type = $data['type'];

        if (!AdmDivisionTypes::check($this->type)) {
            throw new Error("Unknown adm division type: {$this->type}");
        }

        $this->caption = $data['caption'] ?? null;
        $this->name = $data['name'];
        $this->is_default = $data['is_default'] ?? null;
        $this->flags = isset($data['flags']) ? new Flags($data['flags']) : null;
        $this->city_alias = $data['city_alias'] ?? null;
    }
}

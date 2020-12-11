<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items\Building;

/**
 * Данные о количестве квартир и материале здания
 *
 * @package Kuvardin\DoubleGis\Catalog\Items\Building
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class StructureInfo
{
    /**
     * @var string Обозначение материала здания. Поле доступно только в коммерческом API
     */
    public string $material;

    /**
     * @var int Количество квартир в жилом доме. Поле доступно только в коммерческом API
     */
    public int $apartments_count;

    /**
     * @var int Количество квартир в жилом доме. Поле доступно только в коммерческом API
     */
    public int $porch_count;

    /**
     * StructureInfo constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->material = $data['material'];
        $this->apartments_count = $data['apartments_count'];
        $this->porch_count = $data['porch_count'];
    }
}

<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Links\ShortTypes\BranchesShort;

/**
 * Class BranchShort
 *
 * @package Kuvardin\DoubleGis\Catalog\Links\ShortTypes\RailwayTerminals
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class BranchShort
{
    /**
     * @var string Уникальный идентификатор объекта
     */
    public string $id;

    /**
     * @var string Название объекта
     */
    public string $name;

    /**
     * @var string Дополнительная информация
     */
    public string $additional_info;

    /**
     * BranchShort constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->additional_info = $data['additional_info'];
    }
}

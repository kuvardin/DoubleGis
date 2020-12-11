<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items\Building\Floors;

/**
 * Class Plan
 *
 * @package Kuvardin\DoubleGis\Catalog\Items\Building\Floors
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Plan
{
    /**
     * @var string Уникальный идентификатор этажа
     */
    public string $id;

    /**
     * @var string Название этажа для отображения в контроле переключения этажей
     */
    public string $name;

    /**
     * Plan constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
    }
}

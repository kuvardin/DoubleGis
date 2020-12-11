<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items\Building\Floors;

/**
 * Class Plans
 *
 * @package Kuvardin\DoubleGis\Catalog\Items\Building\Floors
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Plans
{
    /**
     * @var string Идентификатор этажа по умолчанию для отображения на карте при показе этажей здания
     */
    public string $default_plan_id;

    /**
     * @var Plan[] Массив этажей здания. Сортировка: от нижних этажей к верхним
     */
    public array $plans = [];

    public function __construct(array $data)
    {
        $this->default_plan_id = $data['default_plan_id'];
        foreach ($data['plans'] as $plan_data) {
            $this->plans[] = new Plan($plan_data);
        }
    }
}

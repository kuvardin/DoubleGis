<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items\Branch;

/**
 * Динамические свойства филиала.
 *
 * @package Kuvardin\DoubleGis\Catalog\Items\Branch
 */
class Context
{
    /**
     * @var StopFactor[]|null Набор блокирующих атрибутов, соответствующих запросу.
     */
    public ?array $stop_factors;

    /**
     * @var string|null Код группы обслуживающих организаций.
     */
    public ?string $servicing_group;

    /**
     * @var array|null Коды групп обслуживающих организаций.
     */
    public ?array $servicing_groups;

    /**
     * @var int|null Расстояние до некой точки в метрах.
     * Считается относительно переданной в запросе точки в параметре point или sort_point,
     * и переданном параметре sort=distance
     * >= 0
     */
    public ?int $distance;

    /**
     * @var bool|null Попадает ли объект в границы сортировки.
     */
    public ?bool $is_in_bound;

    public function __construct(array $data)
    {
        if (isset($data['stop_factors'])) {
            $this->stop_factors = [];
            foreach ($data['stop_factors'] as $stop_factor_data) {
                $this->stop_factors[] = new StopFactor($stop_factor_data);
            }
        }

        $this->servicing_group = $data['servicing_group'] ?? null;
        $this->servicing_groups = $data['servicing_groups'] ?? null;
        $this->distance = $data['distance'] ?? null;
    }
}
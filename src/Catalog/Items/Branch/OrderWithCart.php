<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items\Branch;

/**
 * Class OrderWithCart
 *
 * @package Kuvardin\DoubleGis\Catalog\Items\Branch
 */
class OrderWithCart
{
    /**
     * @var string|mixed|null Номер телефона для связи с компанией с целью оформления заказа
     */
    public ?string $phone;

    /**
     * OrderWithCart constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->phone = $data['phone'] ?? null;
    }
}
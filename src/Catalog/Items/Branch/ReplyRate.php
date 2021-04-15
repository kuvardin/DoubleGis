<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items\Branch;

/**
 * Объект, описывающий время ответа организации
 *
 * @package Kuvardin\DoubleGis\Catalog\Items\Branch
 */
class ReplyRate
{
    /**
     * @var int|null Номер телефона для связи с компанией с целью оформления заказа
     */
    public ?int $phone;

    public function __construct(array $data)
    {
        $this->phone = $data['phone'] ?? null;
    }
}
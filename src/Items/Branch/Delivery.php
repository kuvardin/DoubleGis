<?php

declare(strict_types=1);

namespace Items\Branch;

/**
 * Свойства доставки организации
 *
 * @package Items\Branch
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Delivery
{
    /**
     * @var string Номер телефона для связи с компанией с целью оформления заказа
     */
    public string $phone;

    /**
     * Delivery constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->phone = $data['phone'];
    }
}

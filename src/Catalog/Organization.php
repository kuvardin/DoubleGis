<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog;

/**
 * Организация
 *
 * @package Kuvardin\DoubleGis
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Organization
{
    /**
     * @var string
     */
    public string $id;

    /**
     * @var string Собственное имя организации
     */
    public string $name;

    /**
     * @var int Количество филиалов данной организации
     */
    public int $branch_count;

    /**
     * Organization constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->branch_count = $data['branch_count'];
    }
}

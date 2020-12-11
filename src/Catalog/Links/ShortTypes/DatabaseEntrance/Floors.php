<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Links\ShortTypes\DatabaseEntrance;

/**
 * Информация о распределении квартир по этажам
 *
 * @package Kuvardin\DoubleGis\Catalog\Links\ShortTypes\DatabaseEntrance
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Floors
{
    /**
     * @var string Непустое название этажа
     */
    public string $name;

    /**
     * @var Apartments[] Квартиры на этаже
     */
    public array $apartments = [];

    /**
     * Floors constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'];
        if (isset($data['apartments']['start']) || isset($data['apartments']['end']) ||
            isset($data['apartments']['step'])) {
            $this->apartments[] = new Apartments($data['apartments']);
        } else {
            foreach ($data['apartments'] as $apartments_data) {
                $this->apartments[] = new Apartments($apartments_data);
            }
        }
    }
}

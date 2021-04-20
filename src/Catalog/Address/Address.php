<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Address;

/**
 * Адрес, по которому располагается филиал организации
 *
 * @package Kuvardin\DoubleGis
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Address
{
    /**
     * @var string|null Уникальный идентификатор дома, к которому относится данный адрес
     */
    public ?string $building_id;

    /**
     * @var string|null Почтовый индекс
     */
    public ?string $postcode;

    /**
     * @var string|null Уникальный почтовый код здания
     */
    public ?string $building_code;

    /**
     * @var string|null Название здания (в адресе для филиалов)
     */
    public ?string $building_name;

    /**
     * @var string|null Makani адрес объекта
     */
    public ?string $makani;

    /**
     * @var Component[]|null Массив компонентов адреса
     */
    public ?array $components = null;

    /**
     * @var string|null URL для регистрации бизнес-коннекшна просмотра профиля
     */
    public ?string $reg_bc_url;

    /**
     * Address constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->building_id = $data['building_id'] ?? null;
        $this->postcode = $data['postcode'] ?? null;
        $this->building_code = $data['building_code'] ?? null;
        $this->building_name = $data['building_name'] ?? null;
        $this->makani = $data['makani'] ?? null;
        if (isset($data['components'])) {
            $this->components = array_map(static fn($component_data) => Component::make($component_data),
                $data['components']);
        }
        $this->reg_bc_url = $data['reg_bc_url'] ?? null;
    }

    /**
     * @param string $type
     * @return Component|null
     */
    public function getComponent(string $type): ?Component
    {
        if (!empty($this->components)) {
            foreach ($this->components as $component) {
                if ($component::getType() === $type) {
                    return $component;
                }
            }
        }

        return null;
    }
}

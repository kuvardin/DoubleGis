<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog;

/**
 * Дополнительные сведения о временно не работающем филиале.
 *
 * @package Kuvardin\DoubleGis\Catalog
 */
class TempClosedParam
{
    /**
     * @var string Тип параметра.
     */
    public string $type;

    /**
     * @var string Значение параметра.
     */
    public string $value;

    /**
     * @var string Имя параметра.
     */
    public string $name;

    /**
     * TempClosedParam constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->type = $data['type'];
        $this->value = $data['value'];
        $this->name = $data['name'];
    }
}
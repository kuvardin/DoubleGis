<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Links\ShortTypes;

/**
 * Ближайшая парковка
 *
 * @package Kuvardin\DoubleGis\Catalog\Links\ShortTypes
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class NearestParking
{
    /**
     * @var string Уникальный идентификатор парковки
     */
    public string $id;

    /**
     * NearestParking constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
    }
}

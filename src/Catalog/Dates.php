<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog;

/**
 * Время внесения информации о филиале в БД.
 *
 * @package Kuvardin\DoubleGis\Catalog\Items
 */
class Dates
{
    /**
     * @var string|null Дата последнего изменения информации об организации в формате ISO 8601.
     */
    public ?string $updated_at = null;

    /**
     * @var string|null Дата удаления организации из базы в формате ISO 8601.
     */
    public ?string $deleted_at = null;

    /**
     * @var string|null Дата открытия организации в формате ISO 8601.
     */
    public ?string $created_at = null;

    /**
     * Dates constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->updated_at = $data['updated_at'] ?? null;
        $this->deleted_at = $data['deleted_at'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
    }
}
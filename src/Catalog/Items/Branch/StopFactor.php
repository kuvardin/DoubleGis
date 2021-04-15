<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items\Branch;

/**
 * Набор блокирующих атрибутов, соответствующих запросу.
 *
 * @package Kuvardin\DoubleGis\Catalog\Items\Branch
 */
class StopFactor
{
    /**
     * @var string Имя дополнительного атрибута.
     */
    public string $name;

    /**
     * @var string|null Идентификатор фильтра по атрибуту. Может отсутствовать, если по данному атрибуту нельзя фильтровать.
     */
    public ?string $tag;

    /**
     * StopFactor constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->tag = $data['tag'] ?? null;
    }
}
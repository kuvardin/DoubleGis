<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Reviews;

use Error;

/**
 * Список провайдеров
 *
 * @package Kuvardin\DoubleGis\Catalog\Reviews
 */
class Item
{
    /**
     * @var string Название провайдера
     */
    public string $tag;

    /**
     * @var bool Разрешено ли отображать отзывы к этому объекту, а также создавать новые отзывы.
     */
    public bool $is_reviewable;

    /**
     * Item constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->tag = $data['tag'];
        $this->is_reviewable = $data['is_reviewable'];
    }
}
<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Links\Servicing;

use Kuvardin\DoubleGis\Catalog\Links\Item;

/**
 * Обслуживающие организации
 *
 * @package Kuvardin\DoubleGis\Catalog\Links
 */
class Servicing
{
    /**
     * @var int Количество связанных объектов >= 1
     */
    public int $count;

    /**
     * @var int|null Количество филиалов, на которые можно написать отзыв на flamp.ru >= 0
     */
    public ?int $allowed_for_reviews_count;

    /**
     * @var Item|null Краткая информация о связанных объектах.
     */
    public ?array $items;

    /**
     * Servicing constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->count = $data['count'];
        $this->allowed_for_reviews_count = $data['allowed_for_reviews_count'] ?? null;
        if (isset($data['items'])) {
            $this->items = [];
            foreach ($data['items'] as $item_data) {
                $this->items[] = new Item($item_data);
            }
        }
    }
}
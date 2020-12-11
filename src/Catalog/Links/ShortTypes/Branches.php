<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Links\ShortTypes;

use Kuvardin\DoubleGis\Catalog\Links\ShortTypes\Branches\Branch;

/**
 * Class Branches
 *
 * @package Kuvardin\DoubleGis\Catalog\Links\ShortTypes
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Branches
{
    /**
     * @var int Количество связанных объектов
     */
    public int $count;

    /**
     * @var int|null Количество филиалов, на которые можно написать отзыв на flamp.ru
     */
    public ?int $allowed_for_reviews_count;

    /**
     * @var Branch[]|null Краткая информация о связанных объектах
     */
    public ?array $items = null;

    /**
     * Organizations constructor.
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
                $this->items[] = new Branch($item_data);
            }
        }
    }
}

<?php


namespace Kuvardin\DoubleGis\Catalog\Items\AdmDivision;

use Kuvardin\DoubleGis\Catalog\Reviews\Item;

/**
 * Отзывы о геообъекте. (AdmDiv)
 *
 * @package Kuvardin\DoubleGis\Catalog\Reviews
 */
class Review
{
    /**
     * @var bool|null Разрешено ли отображать отзывы к этому объекту, а также создавать новые отзывы.
     */
    public ?bool $is_reviewable;

    /**
     * @var bool|null Разрешено ли оставлять отзывы к данному объекту на сервисе Flamp.
     */
    public ?bool $is_reviewable_on_flamp;

    /**
     * @var Item[]|null Список провайдеров.
     */
    public ?array $items;

    /**
     * @var float|null Рейтинг объекта
     */
    public ?float $general_rating;

    /**
     * @var int|null Общее количество отзывов
     */
    public ?int $general_review_count;

    /**
     * Review constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->is_reviewable = $data['is_reviewable'] ?? null;
        $this->is_reviewable_on_flamp = $data['is_reviewable_on_flamp'] ?? null;
        $this->items = $data['items'] ?? null;
        $this->general_rating = $data['general_rating'] ?? null;
        $this->general_review_count = $data['general_review_count'] ?? null;
    }
}
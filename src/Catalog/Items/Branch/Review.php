<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items\Branch;


use Kuvardin\DoubleGis\Catalog\Reviews\Item;

/**
 * Отзывы о геообъекте. (Branch)
 *
 * @package Kuvardin\DoubleGis\Catalog\Items\Branch
 */
class Review
{
    /**
     * @var bool Разрешено ли отображать отзывы к этому объекту, а также создавать новые отзывы.
     */
    public bool $is_reviewable;

    /**
     * @var int|null Общее количество отзывов
     */
    public ?int $general_review_count;

    /**
     * @var int|null Количество отзывов на сервисе Flamp.
     */
    public ?int $review_count;

    /**
     * @var float|null Средний рейтинг организации. Рассчитывается как среднее арифметическое рейтингов филиалов
     */
    public ?float $org_rating;

    /**
     * @var Item[]|null Список провайдеров.
     */
    public ?array $items;

    /**
     * @var bool[]|null Нужно ли показывать отзывы на всю организацию по умолчанию вместо одного филиала.
     * Принимает значение true, если у каждого филиала фирмы, у которого включены отзывы, присутствует более 50% рубрик из списка.
     */
    public ?array $is_org_reviews;

    /**
     * @var float|null Рейтинг филиала на сервисе Flamp. [0-5]
     */
    public ?float $rating;

    /**
     * @var float|null Рейтинг филиала
     */
    public ?float $general_rating;

    /**
     * @var int|null Количество рекомендаций на сервисе Flamp
     * >=0
     */
    public ?int $recommendation_count;

    /**
     * @var int|null Общее количество отзывов организации
     */
    public ?int $org_review_count;

    /**
     * Review constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->is_reviewable = $data['is_reviewable'];
        $this->general_review_count = $data['general_review_count'] ?? null;
        $this->review_count = $data['review_count'] ?? null;
        $this->org_rating = $data['org_rating'] ?? null;
        $this->items = $data['items'] ?? null;
        $this->is_org_reviews = $data['items'] ?? null;
        $this->rating = $data['rating'] ?? null;
        $this->general_rating = $data['general_rating'] ?? null;
        $this->recommendation_count = $data['recommendation_count'] ?? null;
        $this->org_review_count = $data['org_review_count'] ?? null;
    }
}
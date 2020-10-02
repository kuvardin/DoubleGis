<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis;

use Kuvardin\DoubleGis\Items\Item;
use Kuvardin\DoubleGis\Rubrics\ContextRubric;

/**
 * Class ItemsList
 *
 * @package Kuvardin\DoubleGis
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class ItemsList
{
    /** были определены контекстные рубрики запроса */
    public const REQUEST_TYPE_DISCOVERY = 'discovery';

    /** не были определены контекстные рубрики запроса */
    public const REQUEST_TYPE_RECOVERY = 'recovery';

    /**
     * @var int
     */
    public int $total;

    /**
     * @var Item[] Объекты результата
     */
    public array $items;

    /**
     * @var ContextRubric[] Массив контекстных категорий
     */
    public array $context_rubrics;

    /**
     * @var int Тип запроса для отправки в статистику
     */
    public int $search_type;

    /**
     * @var string Тип поискового запроса (self::REQUEST_TYPE_*)
     */
    public string $request_type;

    /**
     * @var string|null Базовый хеш
     */
    public ?string $hash;

//    public array $ads;

//    public Ad $ad;

//    public Filters $filters;

//    public array $widgets;

//    public array $search_attributes;

//    public array $cb;

    /**
     * ItemsList constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->total = $data['total'];
        $this->items = array_map(static fn($item_data) => Item::make($item_data), $data['items']);
        $this->context_rubrics = array_map(static fn($cr_data) => new ContextRubric($cr_data),
            $data['context_rubrics']);
        $this->search_type = $data['search_type'];
        $this->request_type = $data['request_type'];
        $this->hash = $data['hash'] ?? null;
        // ...
    }
}


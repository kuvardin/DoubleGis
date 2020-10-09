<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog;

use Kuvardin\DoubleGis\Catalog\Rubrics\ContextRubric;

/**
 * Class ItemsList
 *
 * @package Kuvardin\DoubleGis\Catalog\Catalog
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class ItemsList
{
    /** были определены контекстные рубрики запроса */
    public const REQUEST_TYPE_DISCOVERY = 'discovery';

    /** не были определены контекстные рубрики запроса */
    public const REQUEST_TYPE_RECOVERY = 'recovery';

    /**
     * @var int Количество найденных объектов
     */
    public int $total;

    /**
     * @var Item[] Объекты результата
     */
    public array $items;

    /**
     * @var ContextRubric[] Массив контекстных категорий
     */
    public ?array $context_rubrics = null;

    /**
     * @var int|null Тип запроса для отправки в статистику
     */
    public ?int $search_type;

    /**
     * @var string|null Тип поискового запроса (self::REQUEST_TYPE_*)
     */
    public ?string $request_type;

    /**
     * @var string|null Базовый хеш
     */
    public ?string $hash;

    // TODO: public array $ads;
    // TODO: public Ad $ad;
    // TODO: public Filters $filters;
    // TODO: public array $widgets;
    // TODO: public array $search_attributes;
    // TODO: public array $cb;

    /**
     * ItemsList constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->total = $data['total'];
        $this->items = array_map(static fn($item_data) => Item::make($item_data), $data['items']);
        $this->context_rubrics = isset($data['context_rubrics'])
            ? array_map(static fn($cr_data) => new ContextRubric($cr_data), $data['context_rubrics'])
            : null;
        $this->search_type = $data['search_type'] ?? null;
        $this->request_type = $data['request_type'] ?? null;
        $this->hash = $data['hash'] ?? null;
        // TODO: ...
    }
}


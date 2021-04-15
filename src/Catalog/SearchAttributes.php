<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog;

use Kuvardin\DoubleGis\Suggests\Part;

/**
 * Подсказка, соответствующая запросу. Поле доступно только в методах автодополнения.
 *
 * @package Kuvardin\DoubleGis
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class SearchAttributes
{
    /**
     * @var string Строка подсказки для suggest.
     */
    public string $suggested_text;

    /**
     * @var Part[] Размеченная часть подсказки.
     */
    public array $suggest_parts;

    /**
     * SearchAttributes constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->suggest_parts = [];
        foreach ($data['suggest_parts'] as $suggest_part_data) {
            $this->suggest_parts[] = new Part($suggest_part_data);
        }

        $this->suggested_text = $data['suggested_text'];
    }
}

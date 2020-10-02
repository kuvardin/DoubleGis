<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis;

use Kuvardin\DoubleGis\Suggest\Part;

/**
 * Class SearchAttributes
 *
 * @package Kuvardin\DoubleGis
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class SearchAttributes
{
    /**
     * @var int
     */
    public int $dgis_source_type;

    /**
     * @var int
     */
    public int $handling_type;

    /**
     * @var float
     */
    public float $personal_priority;

    /**
     * @var string
     */
    public string $suggested_text;

    /**
     * @var Part[]
     */
    public array $suggest_parts;

    /**
     * SearchAttributes constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->dgis_source_type = $data['dgis_source_type'];
        $this->handling_type = $data['handling_type'];
        $this->personal_priority = $data['personal_priority'];

        $this->suggest_parts = [];
        foreach ($data['suggest_parts'] as $suggest_part_data) {
            $this->suggest_parts[] = new Part($suggest_part_data);
        }

        $this->suggested_text = $data['suggested_text'];
    }
}

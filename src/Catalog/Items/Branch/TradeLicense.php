<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items\Branch;

/**
 * Class TradeLicense
 *
 * @package Kuvardin\DoubleGis\Catalog\Items\Branch
 */
class TradeLicense
{
    /**
     * @var string
     */
    public string $license;

    /**
     * @var string|null
     */
    public ?string $type;

    /**
     * @var string|null
     */
    public ?string $end_date;

    /**
     * @var string|null
     */
    public ?string $legal_form;

    /**
     * TradeLicense constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->license = $data['license'];
        $this->type = $data['type'] ?? null;
        $this->end_date = $data['end_date'] ?? null;
        $this->legal_form = $data['legal_form'] ?? null;
    }
}
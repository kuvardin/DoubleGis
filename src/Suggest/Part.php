<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Suggest;

/**
 * Class Part
 *
 * @package Kuvardin\DoubleGis\Suggest
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Part
{
    /**
     * @var bool
     */
    public bool $is_suggested;

    /**
     * @var string
     */
    public string $text;

    /**
     * Part constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->is_suggested = $data['is_suggested'];
        $this->text = $data['text'];
    }
}

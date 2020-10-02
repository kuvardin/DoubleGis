<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Suggest;

use Kuvardin\DoubleGis\Badge;

/**
 * Class Flags
 *
 * @package Kuvardin\DoubleGis\Suggest
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Flags
{
    /**
     * @var bool
     */
    public bool $photos;

    /**
     * @var Badge[]
     */
    public array $badges = [];

    /**
     * Flags constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->photos = $data['photos'];
        if (isset($data['badges'])) {
            $this->badges = array_map(static fn($badge_data) => new Badge($badge_data), $data['badges']);
        }
    }
}

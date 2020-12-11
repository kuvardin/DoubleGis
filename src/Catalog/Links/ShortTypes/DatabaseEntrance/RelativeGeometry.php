<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Links\ShortTypes\DatabaseEntrance;

/**
 * Class RelativeGeometry
 *
 * @package Kuvardin\DoubleGis\Catalog\Links\ShortTypes\DatabaseEntrance
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class RelativeGeometry
{
    /**
     * @var int
     */
    public int $direction;

    /**
     * @var int
     */
    public int $dx;

    /**
     * @var int
     */
    public int $dy;

    /**
     * RelativeGeometry constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->direction = $data['direction'];
        $this->dx = $data['dx'];
        $this->dy = $data['dy'];
    }
}

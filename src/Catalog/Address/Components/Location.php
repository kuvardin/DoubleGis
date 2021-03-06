<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Address\Components;

use Kuvardin\DoubleGis\Catalog\Address\Component;

/**
 * Class Location
 *
 * @package Kuvardin\DoubleGis\Address\Components
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Location extends Component
{
    /**
     * @var string Словесное описание местоположения строения
     */
    public string $comment;

    /**
     * Location constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->comment = $data['comment'];
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Component::TYPE_LOCATION;
    }
}

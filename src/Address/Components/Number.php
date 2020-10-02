<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Address\Components;

use Kuvardin\DoubleGis\Address\Component;

/**
 * Только номер дома
 *
 * @package Address
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Number extends Component
{
    /**
     * @var string
     */
    public string $number;

    /**
     * Number constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->number = $data['number'];
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Component::TYPE_NUMBER;
    }
}

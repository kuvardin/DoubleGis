<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Address\Components;

use Kuvardin\DoubleGis\Catalog\Address\Component;
use Kuvardin\DoubleGis\LongId;

/**
 * Class StreetNumber
 *
 * @package Address
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class StreetNumber extends Component
{
    /**
     * @var LongId|null
     */
    public ?LongId $street_id;

    /**
     * @var string Название улицы
     */
    public string $street;

    /**
     * @var string Номер дома, включая дроби, корпуса и буквенные обозначения
     */
    public string $number;

    /**
     * StreetNumber constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->street_id = isset($data['street_id']) ? new LongId($data['street_id']) : null;
        $this->street = $data['street'];
        $this->number = $data['number'];
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Component::TYPE_STREET_NUMBER;
    }
}

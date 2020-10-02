<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Items\Branch\Attributes;

/**
 * Class Attribute
 *
 * @package Kuvardin\DoubleGis\Items\Branch\Attributes
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Attribute
{
    /**
     * @var string Идентификатор атрибута
     */
    public string $tag;

    /**
     * @var string Название дополнительного атрибута
     */
    public string $name;

    /**
     * Attribute constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->tag = $data['tag'];
        $this->name = $data['name'];
    }
}

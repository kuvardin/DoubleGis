<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Items\Branch;

/**
 * Составные части наименования организации
 *
 * @package Kuvardin\DoubleGis\Items\Branch
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class NameExtended
{
    /**
     * @var string Собственное имя филиала
     */
    public string $primary;

    /**
     * @var string|null Расширение имени филиала
     */
    public ?string $extension;

    /**
     * @var string|null Юридическое название филиала
     */
    public ?string $legal_name;

    /**
     * @var string|null Дополнительная информация к названию филиала,
     * которая должна быть показана в развёрнутой карточке
     */
    public ?string $addition;

    /**
     * @var string|null Описание филиала
     */
    public ?string $description;

    /**
     * @var string|null Короткое имя на карте
     */
    public ?string $short_name;
    /**
     * NameExtended constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->primary = $data['primary'];
        $this->extension = $data['extension'] ?? null;
        $this->legal_name = $data['legal_name'] ?? null;
        $this->addition = $data['addition'] ?? null;
        $this->description = $data['description'] ?? null;
        $this->short_name = $data['short_name'] ?? null;
    }
}

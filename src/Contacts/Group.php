<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Contacts;

use Kuvardin\DoubleGis\Shedule\Shedule;

/**
 * Class Group
 *
 * @package Kuvardin\DoubleGis\Contacts
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Group
{
    /**
     * @var string|null Имя группы контактов
     */
    public ?string $name;

    /**
     * @var string|null Комментарий к группе контактов
     */
    public ?string $comment;

    /**
     * @var Shedule|null
     */
    public ?Shedule $schedule;

    /**
     * @var Contact[] Список контактов
     */
    public array $contacts;

    /**
     * Group constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'] ?? null;
        $this->comment = $data['comment'] ?? null;
        $this->schedule = isset($data['shedule']) ? new Shedule($data['shedule']) : null;
        $this->contacts = array_map(static fn($contact_data) => new Contact($contact_data), $data['contacts']);
    }

}

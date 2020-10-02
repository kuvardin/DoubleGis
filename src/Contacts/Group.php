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
     * @var string Имя группы контактов
     */
    public string $name;

    /**
     * @var string Комментарий к группе контактов
     */
    public string $comment;

    /**
     * @var Shedule
     */
    public Shedule $schedule;

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
        $this->name = $data['name'];
        $this->comment = $data['comment'];
        $this->schedule = new Shedule($data['shedule']);
        $this->contacts = array_map(static fn($contact_data) => new Contact($contact_data), $data['contacts']);
    }

}

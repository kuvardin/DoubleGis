<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Links\ShortTypes\Branches;

use Kuvardin\DoubleGis\Catalog\Contacts\Contact;

/**
 * Краткая информация о связанных объектах
 *
 * @package Kuvardin\DoubleGis\Catalog\Links\ShortTypes\Branches
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Branch
{
    /**
     * @var string Уникальный идентификатор
     */
    public string $id;

    /**
     * @var string Уникальный идентификатор организации
     */
    public string $org_id;

    /**
     * @var string Название
     */
    public string $name;

    /**
     * @var string Дополнительная информация, например название основной рубрики организации или адрес
     */
    public string $additional_info;

    /**
     * @var Contact[]|null Контакты, которые должны быть показаны в карточке основного объекта
     */
    public ?array $contacts = null;

    /**
     * Item constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->org_id = $data['org_id'];
        $this->name = $data['name'];
        $this->additional_info = $data['additional_info'];
        if (isset($data['contacts'])) {
            $this->contacts = [];
            foreach ($data['contacts'] as $contact_data) {
                $this->contacts[] = new Contact($contact_data);
            }
        }
    }
}

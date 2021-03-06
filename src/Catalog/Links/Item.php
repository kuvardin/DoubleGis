<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Links;

use Kuvardin\DataFilter\DataFilter;
use Kuvardin\DoubleGis\Catalog\Contacts\Contact;
use Kuvardin\DoubleGis\LongId;

/**
 * Краткая информация о связанных объектах
 *
 * @package Kuvardin\DoubleGis\Catalog\Links
 */
class Item
{
    public LongId $id;

    /**
     * @var string Название
     */
    public string $name;

    /**
     * @var string|null Дополнительная информация, например название основной рубрики организации или адрес.
     */
    public ?string $additional_info;

    /**
     * @var array|null Контакты, которые должны быть показаны в карточке основного объекта
     */
    public ?array $contacts;

    /**
     * @var string|null Уникальный идентификатор организации.
     */
    public ?string $org_id;

    /**
     * Item constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = new LongId($data['id']);
        $this->name = $data['name'];
        $this->additional_info = $data['additional_info'] ?? null;

        if (isset($data['contacts'])) {
            $this->contacts = [];
            foreach ($data['contacts'] as $contact_data) {
                $this->contacts[] = new Contact($contact_data);
            }
        }

        $this->org_id = $data['org_id'] ?? null;

        DataFilter::searchUnknownFields($data, ['id', 'name', 'additional_info', 'contacts', 'org_id']);
    }
}
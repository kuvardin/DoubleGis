<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Rubricator\Items;

/**
 * Рублика
 *
 * @package Kuvardin\DoubleGis\Rubricator\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Rubric extends Item
{
    /**
     * @var string Идентификатор рубрики
     */
    public string $id;

    /**
     * @var string Короткая подпись к иконке
     */
    public string $caption;

    /**
     * @var string Название рубрики
     */
    public string $name;

    /**
     * @var string Сео-синоним
     */
    public string $seo_name;

    /**
     * @var string Тег рубрики
     */
    public string $tag;

    /**
     * @var string Подпись рубрики
     */
    public string $title;

    /**
     * @var string Ссылка на иконку
     */
    public string $icon_url;

    /**
     * @var int Количество организаций в данной рубрике
     */
    public int $org_count;

    /**
     * @var int Количество филиалов организаций в данной рубрике
     */
    public int $branch_count;

    /**
     * @var string Идентификатор организации, которая владеет данной рубрикой
     */
    public string $owner_id;

    /**
     * Rubric constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->id = $data['id'];
        $this->caption = $data['caption'];
        $this->name = $data['name'];
        $this->seo_name = $data['seo_name'];
        $this->tag = $data['tag'];
        $this->title = $data['title'];
        $this->icon_url = $data['icon_url'];
        $this->org_count = $data['org_count'];
        $this->branch_count = $data['branch_count'];
        $this->owner_id = $data['owner_id'];
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Item::TYPE_RUBRIC;
    }
}

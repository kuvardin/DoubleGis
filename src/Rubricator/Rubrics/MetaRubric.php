<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Rubricator\Rubrics;

use Kuvardin\DoubleGis\Rubricator\Rubric;

/**
 * Метарубрика
 *
 * @package Kuvardin\DoubleGis\Rubricator\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class MetaRubric extends Rubric
{
    /**
     * @var string Идентификатор метарубрики
     */
    public string $id;

    /**
     * @var string Название метарубрики
     */
    public string $name;

    /**
     * @var string Заголовок рубрики
     */
    public string $title;

    /**
     * @var string Тег рубрики
     */
    public string $tag;

    /**
     * @var string Поисковая строка, которая подставляется в строку поиска для формирования выдачи
     */
    public string $search_query;

    /**
     * @var string Ссылка на иконку
     */
    public string $icon_url;

    /**
     * MetaRubric constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->title = $data['title'];
        $this->tag = $data['tag'];
        $this->search_query = $data['search_query'];
        $this->icon_url = $data['icon_url'];
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Rubric::TYPE_META_RUBRIC;
    }
}

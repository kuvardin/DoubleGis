<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Rubricator\Rubrics;

use Kuvardin\DoubleGis\Rubricator\Rubric;

/**
 * Рублика
 *
 * @package Kuvardin\DoubleGis\Rubricator\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class SimpleRubric extends Rubric
{
    /**
     * @var string Идентификатор рубрики
     */
    public string $id;

    /**
     * @var string Название рубрики
     */
    public string $name;

    /**
     * @var string|null Сео-синоним
     */
    public ?string $seo_name;

    /**
     * @var string|null Тег рубрики
     */
    public ?string $tag;

    /**
     * @var string Подпись рубрики
     */
    public string $title;

    /**
     * @var string|null Ссылка на иконку
     */
    public ?string $icon_url;

    /**
     * @var int Количество организаций в данной рубрике
     */
    public int $org_count;

    /**
     * @var int Количество филиалов организаций в данной рубрике
     */
    public int $branch_count;

    /**
     * @var string|null Идентификатор организации, которая владеет данной рубрикой
     */
    public ?string $owner_id;

    /**
     * Rubric constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->seo_name = $data['seo_name'] ?? null;
        $this->tag = $data['tag'] ?? null;
        $this->title = $data['title'];
        $this->icon_url = $data['icon_url'] ?? null;
        $this->org_count = $data['org_count'];
        $this->branch_count = $data['branch_count'];
        $this->owner_id = $data['owner_id'] ?? null;
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Rubric::TYPE_SIMPLE_RUBRIC;
    }
}

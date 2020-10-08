<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Rubricator\Rubrics;

use Kuvardin\DoubleGis\Rubricator\Rubric;

/**
 * Псевдорубрика
 *
 * @package Kuvardin\DoubleGis\Rubricator\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class PseudoRubric extends Rubric
{
    /**
     * @var string Заголовок рубрики
     */
    public string $title;

    /**
     * @var PseudoRubric\Action Действие, выполняемое при клике по рубрике
     */
    public PseudoRubric\Action $action;

    /**
     * @var string Ссылка на иконку
     */
    public string $icon_url;

    /**
     * @var string Идентификатор организации, которая владеет данной псевдорубрикой
     */
    public string $owner_id;

    /**
     * @var string Уникальный идентификатор проекта
     */
    public string $region_id;

    /**
     * @var string Уникальный идентификатор сегмента
     */
    public string $segment_id;

    /**
     * PseudoRubric constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->title = $data['title'];
        $this->action = new PseudoRubric\Action($data['action']);
        $this->icon_url = $data['icon_url'];
        $this->owner_id = $data['owner_id'];
        $this->region_id = $data['region_id'];
        $this->segment_id = $data['segment_id'];
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Rubric::TYPE_PSEUDO_RUBRIC;
    }
}

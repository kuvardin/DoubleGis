<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Rubricator\Rubrics;

use Kuvardin\DoubleGis\Rubricator\Rubric;

/**
 * Объединяющая рубрика
 *
 * @package Kuvardin\DoubleGis\Rubricator\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class GeneralRubric extends Rubric
{
    /**
     * @var string Идентификатор объединяющей рубрики
     */
    public string $id;

    /**
     * @var string Название рубрики
     */
    public string $name;

    /**
     * @var int Количество организаций в данной рубрике
     */
    public int $org_count;

    /**
     * @var int Количество филиалов организаций в данной рубрике
     */
    public int $branch_count;

    /**
     * GeneralRubric constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->org_count = $data['org_count'];
        $this->branch_count = $data['branch_count'];
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Rubric::TYPE_GENERAL_RUBRIC;
    }
}

<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Rubricator\Rubrics;

use Kuvardin\DoubleGis\Rubricator\Rubric;

/**
 * Рубрика для владельца РМ «Здесь можно купить»
 *
 * @package Kuvardin\DoubleGis\Rubricator\Items
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class OwnedRubric extends Rubric
{
    /**
     * @var string Идентификатор рубрики ЗМК
     */
    public string $id;

    /**
     * @var string Название рубрики
     */
    public string $name;

    /**
     * @var string Идентификатор организации, которая владеет данной ЗМК-рубрикой
     */
    public string $owner_id;

    /**
     * @var int Количество организаций в данной рубрике
     */
    public int $org_count;

    /**
     * @var int Количество филиалов организаций в данной рубрике
     */
    public int $branch_count;

    /**
     * OwnedRubric constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->owner_id = $data['owner_id'];
        $this->org_count = $data['org_count'];
        $this->branch_count = $data['branch_count'];
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return Rubric::TYPE_OWNED_RUBRIC;
    }
}

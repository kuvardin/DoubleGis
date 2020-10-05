<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Rubricator\Items\PseudoRubric;

/**
 * Class Action
 *
 * @package Kuvardin\DoubleGis\Rubricator\Items\PseudoRubric
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Action
{
    /** web-ссылка */
    public const TYPE_LINK = 'link';

    /** звонок по указанному телефону */
    public const TYPE_PHONE = 'phone';

    /** заказ обратного звонка */
    public const TYPE_CALLBACK = 'callback';

    /** открытие карточки объекта справочника */
    public const TYPE_OPEN_CARD = 'open_card';

    /** найти все филиалы организации */
    public const TYPE_SEARCH_BY_ORG = 'search_by_org';

    /** найти все филиалы рубрики */
    public const TYPE_SEARCH_BY_RUBRIC = 'search_by_rubric';

    /** выполнить поиск по тексту */
    public const TYPE_SEARCH_BY_QUERY = 'search_by_query';


}

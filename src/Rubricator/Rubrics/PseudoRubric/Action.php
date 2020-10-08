<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Rubricator\Rubrics\PseudoRubric;

use Error;

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

    /** все типы */
    public const TYPE_ALL = [
        self::TYPE_LINK,
        self::TYPE_PHONE,
        self::TYPE_CALLBACK,
        self::TYPE_OPEN_CARD,
        self::TYPE_SEARCH_BY_ORG,
        self::TYPE_SEARCH_BY_RUBRIC,
        self::TYPE_SEARCH_BY_QUERY,
    ];

    /**
     * @var string Тип действия
     */
    public string $type;

    /***
     * @var string Соответствие типов действия и значений поля value:
     * link — URL страницы, которую требуется открыть;
     * phone — телефон в формате +<цифры без разделителей>;
     * callback — URL страницы, на которую требуется отправить данные для заказа обратного звонка;
     * open_card — идентификатор объекта справочника, карточку которого требуется открыть;
     * search_by_org — идентификатор организации, филиалы которой требуется найти;
     * search_by_rubric — идентификатор рубрики, филиалы которой требуется найти;
     * search_by_query — текст запроса, по которому требуется выполнить поиск.
     */
    public string $value;

    /**
     * @var string|null Имя действия.
     * Если поле отсутствует, используют для подписи общую локализованную фразу «Узнать больше».
     */
    public ?string $name;

    /**
     * @var string[]|null Коды платформ
     */
    public ?array $platforms;

    /**
     * @var string|null Подпись, отражающая назначение CTA.
     * Если данное поле присутствует, то именно оно должно быть использовано в качестве надписи на кнопке.
     */
    public ?string $caption;

    /**
     * Action constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->type = $data['type'];
        if (!self::checkType($this->type)) {
            throw new Error("Unknown type: {$this->type}");
        }

        $this->value = $data['value'];
        $this->name = $data['name'] ?? null;
        $this->platforms = $data['platforms'] ?? null;
        $this->caption = $data['caption'] ?? null;
    }

    /**
     * @param string $type
     * @return bool
     */
    public static function checkType(string $type): bool
    {
        return in_array($type, self::TYPE_ALL, true);
    }
}

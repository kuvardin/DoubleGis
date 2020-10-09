<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Contacts;

use Error;

/**
 * Class Contact
 *
 * @package Kuvardin\DoubleGis\Contacts
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Contact
{
    /** электронная почта */
    public const TYPE_EMAIL = 'email';

    /** сайт, протокол http */
    public const TYPE_WEBSITE = 'website';

    /** телефон */
    public const TYPE_PHONE = 'phone';

    /** факс */
    public const TYPE_FAX = 'fax';

    /** аккаунт в ICQ */
    public const TYPE_ICQ = 'icq';

    /** Jabber */
    public const TYPE_JABBER = 'jabber';

    /** Skype */
    public const TYPE_SKYPE = 'skype';

    /** ВКонтакте */
    public const TYPE_VKONTAKTE = 'vkontakte';

    /** Twitter */
    public const TYPE_TWITTER = 'twitter';

    /** Instagram */
    public const TYPE_INSTAGRAM = 'instagram';

    /** Facebook */
    public const TYPE_FACEBOOK = 'facebook';

    /** P.O.Box (абонентский ящик) */
    public const TYPE_POBOX = 'pobox';

    /** Youtube */
    public const TYPE_YOUTUBE = 'youtube';

    /** ok.ru */
    public const TYPE_ODNOKLASSNIKI = 'odnoklassniki';

    /** Google + */
    public const TYPE_GOOGLEPLUS = 'googleplus';

    /** Linkedin */
    public const TYPE_LINKEDIN = 'linkedin';

    /** Pinterest; */
    public const TYPE_PINTEREST = 'pinterest';

    /** Whatsapp; */
    public const TYPE_WHATSAPP = 'whatsapp';

    /** Telegram; */
    public const TYPE_TELEGRAM = 'telegram';

    /** Viber */
    public const TYPE_VIBER = 'viber';

    /** все типы */
    public const TYPES_ALL = [
        self::TYPE_EMAIL,
        self::TYPE_WEBSITE,
        self::TYPE_PHONE,
        self::TYPE_FAX,
        self::TYPE_ICQ,
        self::TYPE_JABBER,
        self::TYPE_SKYPE,
        self::TYPE_VKONTAKTE,
        self::TYPE_TWITTER,
        self::TYPE_INSTAGRAM,
        self::TYPE_FACEBOOK,
        self::TYPE_POBOX,
        self::TYPE_YOUTUBE,
        self::TYPE_ODNOKLASSNIKI,
        self::TYPE_GOOGLEPLUS,
        self::TYPE_LINKEDIN,
        self::TYPE_PINTEREST,
        self::TYPE_WHATSAPP,
        self::TYPE_TELEGRAM,
        self::TYPE_VIBER,
    ];

    /**
     * @var string Тип контакта
     */
    public string $type;

    /**
     * @var string Техническое значение контакта
     */
    public string $value;

    /**
     * @var string Значение контакта для вывода на экран
     */
    public string $text;

    /**
     * @var string|null Значение контакта для вывода на принтер
     */
    public ?string $print_text;

    /**
     * @var string|null Уточняющая информация о контакте
     */
    public ?string $comment;

    /**
     * @var string|null Ссылка на сайт или социальную сеть
     */
    public ?string $url;

    /**
     * @var string|null URL для регистрации бизнес-коннекшна просмотра профиля
     */
    public ?string $reg_bc_url;

    /**
     * Contact constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->type = $data['type'];

        if (!self::checkType($this->type)) {
            throw new Error("Unknown contact type: {$this->type}");
        }

        $this->value = $data['value'];
        $this->text = $data['text'];
        $this->print_text = $data['print_text'] ?? null;
        $this->comment = $data['comment'] ?? null;
        $this->url = $data['url'] ?? null;
        $this->reg_bc_url = $data['reg_bc_url'] ?? null;
    }

    /**
     * @param string $type
     * @return bool
     */
    public static function checkType(string $type): bool
    {
        return in_array($type, self::TYPES_ALL, true);
    }
}

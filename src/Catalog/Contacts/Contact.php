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
     * @var string|null Значение контакта для вывода на экран
     */
    public ?string $text;

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
        $this->text = $data['text'] ?? null;
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

    /**
     * @return string
     */
    public function getShortValue(): string
    {
        switch ($this->type) {
            case self::TYPE_PHONE:
                if (!preg_match('|^\+?\d+|', $this->value, $match)) {
                    throw new Error("Incorrect phone number: {$this->value}");
                }
                return $match[0];

            case self::TYPE_EMAIL:
            case self::TYPE_SKYPE:
            case self::TYPE_ICQ:
                return $this->value;

            case self::TYPE_WEBSITE:
                return $this->url;

            case self::TYPE_INSTAGRAM:
                if (!preg_match('|^https://instagram\.com/([A-Za-z0-9_.]+)(\?.*)?$|ui', $this->url, $match)) {
                    throw new Error("Incorrect Instagram url: {$this->url}");
                }
                return $match[1];

            case self::TYPE_FACEBOOK:
                if (preg_match('|^https://facebook\.com/([A-Za-z0-9\-_./]+)(\?.*)?$|ui', $this->url, $match)) {
                    return $match[1];
                }

                if (preg_match('|^https://facebook\.com/profile\.php\?id=(\d+)|ui', $this->url, $match)) {
                    return "id:{$match[1]}";
                }
                throw new Error("Incorrect FaceBook url: {$this->url}");

            case self::TYPE_WHATSAPP:
                if (!preg_match('|^https://wa\.me/(\d+)|ui', $this->url, $match)) {
                    throw new Error("Incorrect WhatsApp url value: {$this->url}");
                }
                return $match[1];

            case self::TYPE_ODNOKLASSNIKI:
                if (!preg_match('#^https://ok\.ru/([A-Za-z0-9_./]+)(\?.*)?$#', $this->url, $match)) {
                    throw new Error("Incorrect Odnoklassniki url value: {$this->value}");
                }
                return $match[1];

            case self::TYPE_VKONTAKTE:
                if (!preg_match('|^https://vk\.com/([A-Za-z0-9_.]+)(\?.*)?$|', $this->url, $match)) {
                    throw new Error("Incorrect VK url value: {$this->url}");
                }
                return $match[1];

            case self::TYPE_TELEGRAM:
                if (!preg_match('|^https://t\.me/([A-Za-z0-9_.]+)(\?.*)?$|', $this->url, $match)) {
                    throw new Error("Incorrect Telegram url value: {$this->url}");
                }
                return $match[1];

            case self::TYPE_YOUTUBE:
                if (preg_match('|^https://(www\.)?youtube\.com/([A-Za-z0-9\-_./]+)(\?.*)?$|', $this->url, $match)) {
                    return $match[2];
                }
                throw new Error("Incorrect YouTube url value: {$this->url}");

            case self::TYPE_VIBER:
                if (!preg_match('|^viber://contact/\?number=(\d+)|', $this->url, $match)) {
                    throw new Error("Incorrect Viber url value: {$this->url}");
                }
                return $match[1];

            case self::TYPE_TWITTER:
                if (!preg_match('|^https://twitter\.com/(mobile\.twitter\.com/)?([A-Za-z0-9_.]+)(\?.*)?$|',
                    $this->url, $match)) {
                    throw new Error("Incorrect Twitter url value: {$this->url}");
                }
                return $match[2];

            case self::TYPE_LINKEDIN:
                if (!preg_match('|^https://linkedin\.com/([A-Za-z0-9_./]+)(\?.*)?$|', $this->url, $match)) {
                    throw new Error("Incorrect LinkedIn url value: {$this->url}");
                }
                return $match[1];

            case self::TYPE_FAX:
            case self::TYPE_JABBER:
            case self::TYPE_POBOX:
            case self::TYPE_GOOGLEPLUS:
            case self::TYPE_PINTEREST:
                // TODO:
                return $this->url;
                throw new Error("Unknown contact typed {$this->type}: " . print_r($this, true));
        }
    }

    /**
     * @param string $type
     * @param string $short_value
     * @return string|null
     */
    public static function getUrlByShortValue(string $type, string $short_value): ?string
    {
        switch ($type) {
            case self::TYPE_PHONE:
            case self::TYPE_EMAIL:
            case self::TYPE_SKYPE:
                return null;

            case self::TYPE_WEBSITE:
                return $short_value;

            case self::TYPE_ICQ:
                return "https://icq.im/$short_value";

            case self::TYPE_INSTAGRAM:
                return "https://instagram.com/$short_value";

            case self::TYPE_FACEBOOK:
                if (strpos($short_value, 'id:') === 0) {
                    $short_value = substr($short_value, 3);
                    return "https://facebook\.com/profile.php?id=$short_value";
                }
                return "https://facebook.com/$short_value";

            case self::TYPE_WHATSAPP:
                return "https://wa.me/$short_value";

            case self::TYPE_ODNOKLASSNIKI:
                return "https://ok.ru/$short_value";

            case self::TYPE_VKONTAKTE:
                return "https://vk.com/$short_value";

            case self::TYPE_TELEGRAM:
                return "https://t.me/$short_value";

            case self::TYPE_YOUTUBE:
                return "https://youtube.com/$short_value";


            case self::TYPE_VIBER:
                return "viber://contact/?number=$short_value";

            case self::TYPE_TWITTER:
                return "https://twitter.com/$short_value";

            case self::TYPE_LINKEDIN:
                return "https://linkedin.com/$short_value";

            case self::TYPE_FAX:
            case self::TYPE_JABBER:
            case self::TYPE_POBOX:
            case self::TYPE_GOOGLEPLUS:
            case self::TYPE_PINTEREST:
                throw new Error("Unknown contact typed {$type}: $short_value");
        }
    }
}

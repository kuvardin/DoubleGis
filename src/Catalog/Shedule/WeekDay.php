<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Shedule;

/**
 * Class WeekDay
 *
 * @package Kuvardin\DoubleGis\Shedule
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class WeekDay
{
    /** понедельник */
    public const CODE_MONDAY = 'Mon';

    /** вторник */
    public const CODE_TUESDAY = 'Tue';

    /** среда */
    public const CODE_WEDNESDAY = 'Wed';

    /** четверг */
    public const CODE_THURSDAY = 'Thu';

    /** пятница */
    public const CODE_FRIDAY = 'Fri';

    /** суббота */
    public const CODE_SATURDAY = 'Sat';

    /** воскресенье */
    public const CODE_SUNDAY = 'Sun';

    /** все дни недели */
    public const ALL = [
        self::CODE_MONDAY,
        self::CODE_TUESDAY,
        self::CODE_WEDNESDAY,
        self::CODE_THURSDAY,
        self::CODE_FRIDAY,
        self::CODE_SATURDAY,
        self::CODE_SUNDAY,
    ];

    /**
     * @var string
     */
    public string $code;

    /**
     * @var WorkingHours[] Часы работы
     */
    public array $working_hours;

    /**
     * WeekDay constructor.
     *
     * @param string $code
     * @param array $data
     */
    public function __construct(string $code, array $data)
    {
        $this->code = $code;
        $this->working_hours = array_map(static fn(array $wh_data) => new WorkingHours($wh_data),
            $data['working_hours']);
    }

    /**
     * @param string $code
     * @return bool
     */
    public static function checkCode(string $code): bool
    {
        return in_array($code, self::ALL, true);
    }
}

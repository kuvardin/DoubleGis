<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Shedule;

/**
 * Class Shedule
 *
 * @package Shedule
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Shedule
{
    /**
     * @var WeekDay[]
     */
    public array $week_days = [];

    /**
     * @var bool Признак того, что организация работает круглосуточно 7 дней в неделю.
     * Если поле отсутствует, то организация не считается работающей круглосуточно.
     */
    public bool $is_24x7;

    /**
     * @var string|null Комментарий
     */
    public ?string $comment;

    /**
     * @var string|null Локализованное описание возможных изменений во времени работы.
     * Применяется для праздников, временных ограничений и т.д.
     */
    public ?string $description;

    /**
     * @var string|null Дата начала изменений в расписании работы. Формат: "YYYY-MM-DD"
     */
    public ?string $date_from;

    /**
     * @var string|null Дата конца изменений в расписании работы. Формат: "YYYY-MM-DD"
     */
    public ?string $date_to;

    /**
     * Shedule constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        foreach (WeekDay::ALL as $week_day_code) {
            $this->week_days[$week_day_code] = isset($data[$week_day_code])
                ? new WeekDay($week_day_code, $data[$week_day_code])
                : null;
        }

        $this->is_24x7 = $data['is_24x7'] ?? false;
        $this->comment = $data['comment'] ?? null;
        $this->description = $data['description'] ?? null;
        $this->date_from = $data['date_from'] ?? null;
        $this->date_to = $data['date_to'] ?? null;
    }
}

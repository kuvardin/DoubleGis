<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Shedule;

/**
 * Class WorkingHours
 *
 * @package Kuvardin\DoubleGis\Shedule
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class WorkingHours
{
    /**
     * @var string|null Значение в формате hh:mm
     */
    public ?string $from;

    /**
     * @var string|null Значение в формате hh:mm
     */
    public ?string $to;

    /**
     * WorkingHours constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->from = $data['from'] ?? null;
        $this->to = $data['to'] ?? null;
    }
}

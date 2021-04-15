<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Catalog\Schedule;

use Error;

/**
 * Class WorkingHours
 *
 * @package Kuvardin\DoubleGis\Schedule
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class WorkingHours
{
    /**
     * @var string Значение в формате hh:mm
     */
    public string $from;

    /**
     * @var string Значение в формате hh:mm
     */
    public string $to;

    /**
     * WorkingHours constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->from = $data['from'];
        $this->to = $data['to'];
    }

    /**
     * @return int
     */
    public function getFromInt(): int
    {
        if (!preg_match('|^(\d{2}):(\d{2})$|', $this->from, $matches)) {
            throw new Error("Incorrect hours from: {$this->from}");
        }

        return (int)$matches[1] * 100 + (int)$matches[2];
    }

    /**
     * @return int
     */
    public function getToInt(): int
    {
        if (!preg_match('|^(\d{2}):(\d{2})$|', $this->to, $matches)) {
            throw new Error("Incorrect hours to: {$this->to}");
        }

        return (int)$matches[1] * 100 + (int)$matches[2];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->from}-{$this->to}";
    }
}

<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis;

use Error;

/**
 * Class Location
 *
 * @package Kuvardin\DoubleGis
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Location
{
    /**
     * @var float
     */
    protected float $latitude;

    /**
     * @var float
     */
    protected float $longitude;

    /**
     * Location constructor.
     *
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct(float $latitude, float $longitude)
    {
        if ($latitude < -90 || $latitude > 90) {
            throw new Error("Incorrect latitude: $latitude");
        }

        if ($longitude < -180 || $longitude > 180) {
            throw new Error("Incorrect longitude: $longitude");
        }

        $this->longitude = $longitude;
        $this->latitude = $latitude;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function parse(array $data): self
    {
        return new self($data['lat'], $data['lon']);
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude(float $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->latitude},{$this->longitude}";
    }
}

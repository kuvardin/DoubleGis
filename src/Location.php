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
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->longitude = $data['lon'];
        $this->latitude = $data['lat'];
    }

    /**
     * @param float $latitude
     * @param float $longitude
     * @return static
     */
    public static function make(float $latitude, float $longitude): self
    {
        if ($latitude < -90 || $latitude > 90) {
            throw new Error("Incorrect latitude: $latitude");
        }

        if ($longitude < -180 || $longitude > 180) {
            throw new Error("Incorrect longitude: $longitude");
        }

        return new self(['lon' => $longitude, 'lat' => $latitude]);
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

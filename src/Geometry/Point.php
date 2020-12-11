<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Geometry;

use Error;

/**
 * Class Point
 *
 * @package Kuvardin\DoubleGis\Geometry
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class Point extends GeometryItem
{
    /**
     * @var float
     */
    public float $latitude;

    /**
     * @var float
     */
    public float $longitude;

    /**
     * Point constructor.
     *
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct(float $latitude, float $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @param string $string
     * @return static
     */
    public static function fromString(string $string): self
    {
        $coordinates = explode(' ', $string);
        if (count($coordinates) !== 2) {
            throw new Error("Incorrect point string: $string");
        }

        return new self((float)$coordinates[0], (float)$coordinates[1]);
    }

    /**
     * @param array $data
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self($data['lat'], $data['lon']);
    }

    /**
     * @return string
     */
    public function getStringForRequest(): string
    {
        return "{$this->latitude},{$this->longitude}";
    }
}

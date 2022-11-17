<?php

namespace App\Services\Point;

use MatanYadaev\EloquentSpatial\Objects\Point;

class DistanceService
{
    const EARTH_RADIUS = 6371;

    public function allowed(array $primaryPoint, array $secondaryPoint): bool
    {
        $primary = new Point($primaryPoint['ltd'], $primaryPoint['lng']);
        $secondary = new Point($secondaryPoint['ltd'], $secondaryPoint['lng']);
        $distance = $this->distance($primary, $secondary);

        return $distance <= config('constants.allowed_distance');
    }

    public function distance(Point $primary, Point $secondary): float
    {
        $lat1 = $primary->latitude * pi() / 180;
        $lat2 = $secondary->latitude * pi() / 180;
        $delta = ($primary->longitude - $secondary->longitude) * pi() / 180;

        return acos(sin($lat1) * sin($lat2) + cos($lat1) * cos($lat2) * cos($delta)) * self::EARTH_RADIUS;
    }
}

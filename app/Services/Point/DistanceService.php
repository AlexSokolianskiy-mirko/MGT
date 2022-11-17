<?php

namespace App\Services\Point;

use MatanYadaev\EloquentSpatial\Objects\Point;

class DistanceService
{
    const EARTH_RADIUS = 6371;

    public function parseCoordinates(array $coordinates) 
    {
        return new Point($coordinates['ltd'], $coordinates['lng']);
    }

    public function allowed(Point $primary, Point $secondary): bool
    {
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

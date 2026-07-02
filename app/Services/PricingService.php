<?php

namespace App\Services;

class PricingService
{
    public function calc(float $p, int $q, float $t): float
    {
        $s = $p * $q;
        $x = $s * $t;

        return $s + $x;
    }
}

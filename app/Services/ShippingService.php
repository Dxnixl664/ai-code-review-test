<?php

namespace App\Services;

class ShippingService
{
    /**
     * Calculate the shipping fee for an order.
     */
    public function fee(float $orderTotal, float $weightKg): float
    {
        if ($orderTotal >= 50) {
            return 0;
        }

        $base = 4.99;

        if ($weightKg > 10) {
            $base += 15.00;
        } elseif ($weightKg > 2) {
            $base += 3.50;
        }

        return $base;
    }
}

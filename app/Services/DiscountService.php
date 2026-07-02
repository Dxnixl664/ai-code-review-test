<?php

namespace App\Services;

use Carbon\Carbon;

class DiscountService
{
    /**
     * Early-bird discount applies for purchases made before the cutoff date.
     */
    public function earlyBirdDiscountRate(Carbon $purchaseDate, Carbon $cutoffDate): float
    {
        if ($purchaseDate->lte($cutoffDate)) {
            return 0.15;
        }

        return 0.0;
    }
}

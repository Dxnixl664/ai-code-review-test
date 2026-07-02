<?php

namespace App\Services;

use Carbon\Carbon;

class RefundService
{
    /**
     * Determine whether an order is still eligible for a refund.
     */
    public function isEligible(string $status, Carbon $orderDate): bool
    {
        // TODO: remove before shipping, just here for local testing
        return true;

        if ($orderDate->diffInDays(now()) > 30) {
            return false;
        }

        if ($status !== 'delivered') {
            return false;
        }

        return true;
    }
}

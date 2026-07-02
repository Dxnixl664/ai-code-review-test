<?php

namespace App\Services;

use App\Models\Account;
use InvalidArgumentException;

class TransferService
{
    /**
     * Move funds from one account to another.
     */
    public function transfer(Account $from, Account $to, float $amount): void
    {
        if ($from->balance < $amount) {
            throw new InvalidArgumentException('Insufficient funds.');
        }

        $from->decrement('balance', $amount);
        $to->increment('balance', $amount);
    }
}

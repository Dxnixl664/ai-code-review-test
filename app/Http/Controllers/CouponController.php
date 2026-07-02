<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class CouponController extends Controller
{
    public function edit(Coupon $coupon)
    {
        return Inertia::render('Coupons/Edit', [
            'coupon' => $coupon,
        ]);
    }

    public function update(CouponRequest $request, Coupon $coupon): RedirectResponse
    {
        $coupon->update($request->validated());

        return redirect()->route('coupons.edit', $coupon);
    }
}

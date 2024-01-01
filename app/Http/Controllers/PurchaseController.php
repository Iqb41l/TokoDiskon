<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;


class PurchaseController extends Controller
{
    public function create()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $purchase = Purchase::create([
            'total_amount' => $request->input('total_amount'),

        ]);

        if ($purchase->total_amount >= 2000000) {
            $voucherAmount = 10000;
            $voucher = $purchase->voucher()->create([
                'code' => uniqid(),
                'used' => false,
                'nilai' => $voucherAmount,
                'expired_at' => now()->addMonths(3),
            ]);
        }

        return view('index', ['purchase' => $purchase]);
    }
}

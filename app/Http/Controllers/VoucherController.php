<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all();
        return view('vouchers.index', compact('vouchers'));
    }

    public function show(Voucher $voucher)
    {
        return view('vouchers.show', compact('voucher'));
    }
    public function useVoucher(Voucher $voucher)
    {
        if (!$voucher->used && $voucher->expired_at >= now()) {
            $voucher->update(['used' => true]);

            return redirect()->route('vouchers.show', $voucher)->with('success', 'Voucher berhasil digunakan.');
        }

        return redirect()->route('vouchers.show', $voucher)->with('error', 'Voucher tidak dapat digunakan.');
    }

    public function search(Request $request)
    {
        $voucherCode = $request->input('voucher_code');
        $voucher = Voucher::where('code', $voucherCode)->first();

        if ($voucher) {
            return view('vouchers.show', ['voucher' => $voucher]);
        } else {
            return redirect('/')->with('error', 'Voucher not found.');
        }
    }
}

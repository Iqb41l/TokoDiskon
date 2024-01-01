<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'used', 'nilai', 'expired_at', 'purchase_id'];

    // Tambahkan relasi dengan Purchase
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}

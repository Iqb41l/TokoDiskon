<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = ['total_amount'];

    // Tambahkan relasi dengan Voucher
    public function voucher()
    {
        return $this->hasOne(Voucher::class);
    }
}

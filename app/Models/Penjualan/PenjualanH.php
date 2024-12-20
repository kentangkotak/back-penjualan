<?php

namespace App\Models\Penjualan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanH extends Model
{
    use HasFactory;
    protected $table = 'penjualan_h';
    protected $guarded = ['id'];

    public function rincis()
    {
        return $this->hasMany(PenjualanR::class, 'notrans','notrans');
    }
}

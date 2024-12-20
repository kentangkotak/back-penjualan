<?php

namespace App\Models\Penjualan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanR extends Model
{
    use HasFactory;
    protected $table = 'penjualan_r';
    protected $guarded = ['id'];
}

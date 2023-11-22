<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;

    protected $table="master";

    protected $fillable = [
        'merek_mobil',
        'model_mobil',
        'plat_mobil',
        'stock_mobil',
        'tarif_sewa',
        'jenis_mobil',
    ];



}

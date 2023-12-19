<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengujian extends Model
{
    use HasFactory;

    protected $table = 'pengujians';

    protected $fillable = [
        'idcase', 'test_result', 'catatan', 'qc_id',
    ];

    public function qualitycontrol()
    {
        return $this->belongsTo(Qualitycontrol::class, 'qc_id');
    }

}


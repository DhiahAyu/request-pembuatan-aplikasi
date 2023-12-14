<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penginfrastruktur extends Model
{
    use HasFactory;

    protected $table = 'penginfrastrukturs';

    protected $fillable = [
        'nomor', 'aspekinfrastruktur', 'hasiltes', 'catatann', 'qc_id',
    ];


    public function qualcontrol()
    {
        return $this->belongsTo(Qualitycontrol::class, 'qc_id');
    }
}

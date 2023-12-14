<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualitycontrol extends Model
{
    use HasFactory;

    protected $guarded =[];
    protected $table = 'qualitycontrols';

    protected $fillable = [
        'srs_id','versi', 'dibuat', 'tglrevisi', 'disetujui', 'tglpersetujuan', 'keterangan', 'namaqcc',
        'namaapp', 'versiapp', 'releaseapp', 'tglpengujian', 'jumlahcase', 'caseberhasil', 'caseeror', 'namatimevaluasi', 'namaqc', 'ttdtimevaluasi', 'ttdtimqc', 'namapc',
    ];

    public function rfc()
    {
        return $this->belongsTo(Formsrs::class, 'srs_id');
    }

    // public function pengujians()
    // {
    //     return $this->hasMany(Pengujian::class, 'qc_id', 'id');
    // }

    
    // public function penginfrastrukturs()
    // {
    //     return $this->hasMany(Penginfrastruktur::class, 'qc_id', 'id');
    // }

    public function pengujians()
    {
        return $this->hasMany(Pengujian::class, 'qc_id', 'id');
    }

    public function penginfrastrukturs()
    {
        return $this->hasMany(Penginfrastruktur::class, 'qc_id', 'id');
    }

}



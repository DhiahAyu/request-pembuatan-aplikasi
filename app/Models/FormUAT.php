<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formuat extends Model
{
    use HasFactory;

    protected $table = 'formuat';
    protected $fillable = [
        'request_id',
        'versi',
        'dibuat_oleh',
        'disetujui_oleh',
        'tanggal_persetujuan',
        'keterangan',
        'jumlahtc',
        'jumlahtcberhasil',
        'jumlahtcerror',
        'namapjp',
        'jabatanpjp',
        'ttdpjp',
        'namakte',
        'jabatankte',
        'ttdkte',
        'namasp',
        'jabatansp',
        'ttdsp',
        'namaba',
        'jabatanba',
        'ttdba',
        'namapc',
        'jabatanpc',
        'namaprogrammer',
        'jabatanprogrammer',
        'namatester',
        'jabatantester',
        'tanggal_revisi',
        'tanggalttdpjp',
        'tanggalttdkte',
        'tanggalttddsp',
        'tanggalttdba',
    ];

    public function formsrs()
    {
        return $this->belongsTo(Formrequest::class, 'request_id');
    }

    public function uat()
    {
        return $this->hasMany(UAT::class, 'formuat_id', 'id');
    }
    
    public function ual()
    {
        return $this->hasMany(UAL::class, 'formuat_id', 'id');
    }

    public function catatan()
    {
        return $this->hasMany(CatatanTesting::class, 'formuat_id', 'id');
    }
}

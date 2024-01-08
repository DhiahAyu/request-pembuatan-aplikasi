<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formsrs extends Model
{
    use HasFactory;

    // protected $guarded =[];
    protected $table = 'formsrs';

    protected $fillable = ['request_id'];

    public function rfc()
    {
        return $this->belongsTo(Formrequest::class, 'request_id');
    }

    public function moduls()
    {
        return $this->hasMany(Modul::class, 'srs_id');
    }

    // public function qc()
    // {
    //     return $this->hasOne(Modul::class, 'srs_id');
    // }

    public function qc()
{
    return $this->hasOne(Qualitycontrol::class, 'srs_id'); // Gantilah QCModel dengan nama model QC yang sesuai
}

public function pic()
    {
        return $this->hasMany(Pic::class, 'srs_id');
    }
    
}





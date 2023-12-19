<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formrequest extends Model
{
    use HasFactory;

    protected $guarded =[];
    protected $table = 'formrequests';
    protected $fillable = [
        'nama_aplikasi', 'sponsor_proyek', 'latar_belakang', 'tujuan', 'wanted_feature','current_condition', 'kendala', 'ruang_lingkup',
    ];

    // -----RELASI ANTAR TABLE-----

    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }

    public function cra()
    {
        return $this->hasOne(Formcra::class,'request_id', 'id');
    }

    public function srs()
    {
        return $this->hasOne(Formsrs::class,'request_id', 'id');
    }

    public function formuat()
    {
        return $this->hasOne(FormUAT::class,'request_id', 'id');
    }

    public function flowchart()
    {
        return $this->hasMany(FlowchartImage::class);
    }

    public function uploaddata()
    {
        return $this->hasMany(UploaddataImage::class);
    }
}

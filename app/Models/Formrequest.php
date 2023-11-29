<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formrequest extends Model
{
    use HasFactory;

    protected $guarded =[];
    protected $table = 'formrequests';

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
}

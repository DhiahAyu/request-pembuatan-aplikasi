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
    
}





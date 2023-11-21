<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formcra extends Model
{
    use HasFactory;

    protected $guarded =[];
    protected $table = 'formcras';

    public function rfc()
    {
        return $this->belongsTo(Formrequest::class);
    }

    public function changeMajors()
    {
        return $this->hasMany(ChangeMajor::class);
    }

    public function changeMinors()
    {
        return $this->hasMany(ChangeMinor::class);
    }
}

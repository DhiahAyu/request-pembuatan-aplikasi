<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $table = 'moduls';
    protected $fillable = ['nama', 'srs_id']; 

    public function srs()
    {
        return $this->belongsTo(Formsrs::class, 'srs_id');
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class, 'modul_id');
    }
}

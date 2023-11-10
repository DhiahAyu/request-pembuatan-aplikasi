<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formsrs extends Model
{
    use HasFactory;

    // protected $guarded =[];
    // protected $table = 'formsrs';

    protected $fillable = [
        'nama_modul',
        'requirement',
    ];

    
}





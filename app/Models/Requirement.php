<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model Requirement.php
class Requirement extends Model
{
    protected $table = 'requirements';
    protected $fillable = ['modul_id', 'requirement', 'mockup'];

    public function modul()
    {
        return $this->belongsTo(Modul::class);
    }
}

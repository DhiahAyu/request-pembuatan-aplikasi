<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model Requirement.php
class Requirement extends Model
{
    protected $fillable = ['detail'];

    public function formsrs()
    {
        return $this->belongsTo(Formsrs::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeMinor extends Model
{
    use HasFactory;

    public function cra()
    {
        return $this->belongsTo(Formcra::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeMinor extends Model
{
    protected $table = 'minors';
    use HasFactory;
    protected $fillable = [
        'justification', 'cra_id'
    ];

    public function cra()
    {
        return $this->belongsTo(Formcra::class, 'cra_id');
    }
}

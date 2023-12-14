<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanTesting extends Model
{
    use HasFactory;

    protected $table = 'catatantesting';

    protected $fillable = [
        'formuat_id',
        'catatan',
        'user',
    ];

    public function formuat()
    {
        return $this->belongsTo(Formuat::class, 'formuat_id', 'id');
    }
}

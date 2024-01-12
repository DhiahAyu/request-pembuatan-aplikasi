<?php

// app/Models/Pic.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    protected $table = 'pics';
    protected $fillable = ['name_pic', 'srs_id']; // Perbaikan penamaan kolom

    public function srs()
    {
        return $this->belongsTo(Formsrs::class, 'srs_id');
    }
}


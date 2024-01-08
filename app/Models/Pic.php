<?php

// app/Models/Pic.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    protected $fillable = ['nama_pic', 'srs_id'];

    public function srs()
    {
        return $this->belongsTo(Formsrs::class, 'srs_id');
    }
}

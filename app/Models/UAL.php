<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UAL extends Model
{
    use HasFactory;

    protected $table = 'ual';
    protected $fillable = [
        'formuat_id',
        'tahapan_scenario',
        'test_result',
        'tester',
        'signature',
    ];

    public function formuat()
    {
        return $this->belongsTo(Formuat::class);
    }
}

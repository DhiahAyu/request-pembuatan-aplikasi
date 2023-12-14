<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uat extends Model
{
    use HasFactory;

    protected $table = 'uat';

    protected $fillable = [
        'formuat_id',
        'na',
        'tahapan_scenario',
        'test_result_pass',
        'test_result_fail',
        'tester',
        'signature',
    ];

    public function formuat()
    {
        return $this->belongsTo(Formuat::class, 'formuat_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploaddataImage extends Model
{
    protected $table = 'uploaddata_images';
    use HasFactory;
    protected $fillable = [
        'uploaddata', 'request_id'
    ];

    public function formrequest()
    {
        return $this->belongsTo(FormRequest::class, 'request_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class FlowchartImage extends Model
{
    protected $table = 'flowchart_images';
    use HasFactory;
    protected $fillable = [
        'flowchart', 'request_id'
    ];

    public function formrequest()
    {
        return $this->belongsTo(FormRequest::class, 'request_id');
    }
}

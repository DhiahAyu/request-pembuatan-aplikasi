<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formcra extends Model
{
    use HasFactory;

    protected $guarded =[];
    protected $table = 'formcras';
    protected $fillable = [
        'request_id', 'cr_analyst', 'originator_name', 'data_owner', 'date', 'project_name', 'impact_areas',
        'priority', 'general_context', 'pontential_cost',
        'alternative_solutions', 'support', 'akses_user', 'topologi_server', 'spesifikasi_server',
        'software', 'tipe_data', 'komponen_backup', 'frekuensi_backup', 'lama_backup', 'security', 'actioncra','kirimke',
    ];

    public function rfc()
    {
        return $this->belongsTo(Formrequest::class, 'request_id');
    }

    public function changeMajors()
    {
        return $this->hasMany(ChangeMajor::class, 'cra_id');
    }

    public function changeMinors()
    {
        return $this->hasMany(ChangeMinor::class, 'cra_id');
    }
}

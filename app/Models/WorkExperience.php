<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'position',
        'start_date',
        'end_date',
        'personal_data_id',
    ];

    public function personalData()
    {
        return $this->belongsTo(PersonalData::class);
    }
}

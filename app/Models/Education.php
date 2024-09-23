<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution',
        'level',
        'area',
        'start_date',
        'end_date',
        'personal_data_id',
    ];

    // Relación con el modelo PersonalData
    public function personalData()
    {
        return $this->belongsTo(PersonalData::class);
    }
}



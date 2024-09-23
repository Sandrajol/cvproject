<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'language',
        'level',
        'personal_data_id',
    ];

    // Relación con el modelo PersonalData
    public function personalData()
    {
        return $this->belongsTo(PersonalData::class);
    }
}


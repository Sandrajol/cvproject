<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'personal_data_id',
    ];

    public function personalData()
    {
        return $this->belongsTo(PersonalData::class);
    }
}


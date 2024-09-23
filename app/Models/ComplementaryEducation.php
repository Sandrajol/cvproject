<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplementaryEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'institution',
        'year',
        'personal_data_id',
    ];

    public function personalData()
    {
        return $this->belongsTo(PersonalData::class);
    }
}


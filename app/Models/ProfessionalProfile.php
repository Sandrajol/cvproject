<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalProfile extends Model
{
    use HasFactory;

    protected $fillable = ['Profile', 'personal_data_id'];

    public function personalData()
    {
        return $this->belongsTo(PersonalData::class);
    }
}






<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    use HasFactory;

    protected $table = 'personal_data';

    protected $fillable = [
        'first_name', 'last_name', 'identification', 'birth_date', 'gender', 'phone', 'country', 'department', 'city'
    ];
}




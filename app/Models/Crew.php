<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory;

    protected $fillable = [
        'maps_id',
        'name',
        'profile_picture',
        'position',
        'seamanbook_file_path',
        'passport_file_path',
        'medical_file_path',
        'certificate_file_path',
        'born_date',
        'address',
        'next_of_kind',
        'phone',
        'email',
    ];

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
}

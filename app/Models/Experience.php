<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'crew_id',
        'experience_name'
    ];

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }
}

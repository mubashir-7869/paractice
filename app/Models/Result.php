<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = [
        'sport_id',
        'first_place',
        'second_place',
        'third_place',
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image_path'];

    public function days()
    {
        return $this->hasMany(Day::class);
    }

    public function stops()
    {
        return $this->hasManyThrough(Stop::class, Day::class, 'trip_id', 'day_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    use HasFactory;

    protected $fillable = ['trip_id', 'day_id', 'location', 'latitude', 'longitude', 'rating'];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function rating()
    {
        return $this->hasOne(Rating::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'benefits',
        'duration_minutes',
        'image',
    ];

    public function availableTimes()
    {
        return $this->hasMany(AvailableTime::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

}

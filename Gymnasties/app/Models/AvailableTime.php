<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'day_of_week',
        'start_time',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function Bookings()
    {
        return $this->hasMany(Booking::class);
    }

}

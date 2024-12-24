<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'show_id', 'booking_date', 'slot', 'adults', 'children', 'status'
    ];

        public function seats()
    {
        return $this->belongsToMany(Seat::class, 'booking_seat', 'booking_id', 'seat_id')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function show()
    {
        return $this->belongsTo(Show::class);
    }

        public function payment()
    {
        return $this->hasOne(Payment::class);
    }

}

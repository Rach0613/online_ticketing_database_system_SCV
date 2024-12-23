<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = ['show_id', 'row', 'number', 'status'];

    public function show()
    {
        return $this->belongsTo(Show::class);
    }

        public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_seat', 'seat_id', 'booking_id')->withTimestamps();
    }

    public static function createUniqueSeat($row, $number, $showId)
    {
        return self::firstOrCreate([
            'row' => $row,
            'number' => $number,
            'show_id' => $showId,
        ], [
            'status' => 'available',
        ]);
    }
    

}


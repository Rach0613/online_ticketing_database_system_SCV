<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'slot'];

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    // // Automatically create 60 seats for a new show
    // public static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($show) {
    //         $rows = ['A', 'B', 'C', 'D', 'E']; // Rows (5 rows)
    //         $seatsPerRow = 12; // 12 seats per row (5 * 12 = 60)

    //         foreach ($rows as $row) {
    //             for ($number = 1; $number <= $seatsPerRow; $number++) {
    //                 Seat::create([
    //                     'row' => $row,
    //                     'number' => $number,
    //                     'show_id' => $show->id,
    //                     'status' => 'available',
    //                 ]);
    //             }
    //         }
    //     });
    // }
}

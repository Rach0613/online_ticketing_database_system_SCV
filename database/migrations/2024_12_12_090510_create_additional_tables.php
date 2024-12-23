<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalTables extends Migration
{
    public function up(): void
    {
        // Shows table (morning, afternoon, evening slots)
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->date('date'); // Date of the show
            $table->enum('slot', ['morning', 'afternoon', 'evening']); // Time slot
            $table->timestamps();
        });

        // Seats table (seats for each show)
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->char('row', 1); // Row label (e.g., A, B)
            $table->integer('number'); // Seat number
            $table->foreignId('show_id')->constrained('shows')->onDelete('cascade'); // Link to show
            $table->enum('status', ['available', 'selected', 'sold'])->default('available'); // Seat status
            $table->timestamps();
        });
        
        Schema::table('seats', function (Blueprint $table) {
            $table->unique(['row', 'number', 'show_id'], 'unique_seat_per_show');
        });
        

        // Bookings table (booking details)
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // User making the booking
            $table->foreignId('show_id')->constrained('shows')->onDelete('cascade'); // Show being booked
            $table->date('booking_date'); // Date of the booking
            $table->enum('slot', ['morning', 'afternoon', 'evening']); // Time slot of the booking
            $table->integer('adults')->default(1); // Number of adults
            $table->integer('children')->default(0); // Number of children
            $table->enum('status', ['pending', 'confirmed', 'canceled'])->default('pending'); // Booking status
            $table->text('cancellation_reason')->nullable(); // Reason for cancellation
            $table->timestamps();
        });

        // Booking_Seat pivot table
        Schema::create('booking_seat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade'); // Link to booking
            $table->foreignId('seat_id')->constrained('seats')->onDelete('cascade'); // Link to seat
            $table->timestamps();
        });

        // Payments table
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade'); // Link to booking
            $table->decimal('amount', 10, 2); // Total payment amount
            $table->enum('payment_method', ['credit_card', 'debit_card']); // Payment method
            $table->enum('status', ['successful', 'failed'])->default('successful'); // Payment status
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
        Schema::dropIfExists('booking_seat');
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('seats');
        Schema::dropIfExists('shows');
    }
}

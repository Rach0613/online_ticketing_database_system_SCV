<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            // Add the new column for user_id
            $table->foreignId('user_id')->after('booking_id')->constrained('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            // Remove the user_id column
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}

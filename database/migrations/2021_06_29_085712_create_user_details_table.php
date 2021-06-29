<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    public function up(): void
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('citizenship_country_id');
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('phone_number', 255);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('citizenship_country_id')->references('id')->on('countries');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
}

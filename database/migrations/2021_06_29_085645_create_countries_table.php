<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    public function up(): void
    {
        Schema::create(
            'countries',
            function (Blueprint $table) {
                $table->id();
                $table->string('name', 63)->collation('utf8mb4_unicode_ci')->comment('English country name');
                $table->char('iso2', 2)->collation('ascii_bin')->comment(
                    'ISO 3166-2 two letter upper case country code.'
                );
                $table->char('iso3', 3)->nullable()->collation('ascii_bin')->comment(
                    'ISO 3166-3 three letter upper case country code.'
                );
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('acbr_companies', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->nullableMorphs('owner');
            $blueprint->string('name');
            $blueprint->string('cnpj', 14)->unique();
            $blueprint->string('client_id')->nullable();
            $blueprint->string('client_secret')->nullable();
            $blueprint->json('settings')->nullable();
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acbr_companies');
    }
};

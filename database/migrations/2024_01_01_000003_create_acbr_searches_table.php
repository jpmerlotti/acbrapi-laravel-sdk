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
        Schema::create('acbr_searches', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->foreignId('acbr_company_id')->nullable()->constrained('acbr_companies')->onDelete('cascade');
            $blueprint->string('type'); // CEP, CNPJ, etc.
            $blueprint->string('query');
            $blueprint->json('result')->nullable();
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acbr_searches');
    }
};

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
        Schema::create('acbr_documents', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->foreignId('acbr_company_id')->constrained('acbr_companies')->onDelete('cascade');
            $blueprint->string('type'); // NFe, NFSe, CTe, etc.
            $blueprint->string('external_id')->nullable(); // ID from ACBr API
            $blueprint->string('status')->default('pending');
            $blueprint->string('xml_path')->nullable();
            $blueprint->string('pdf_path')->nullable();
            $blueprint->json('payload')->nullable();
            $blueprint->json('response')->nullable();
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acbr_documents');
    }
};

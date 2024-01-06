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
        Schema::create('forms', function (Blueprint $table) {
            $table->id(); // Unique identifier for each form (INT, AUTO_INCREMENT, PRIMARY KEY)
            $table->string('name'); // Name of the form
            $table->text('description')->nullable(); // Description of the form, optional
            $table->timestamps(); // Timestamps for creation and last update of the form
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};

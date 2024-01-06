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
        Schema::create('form_fields', function (Blueprint $table) {
            $table->id(); // Unique identifier for each form field
            $table->unsignedBigInteger('form_id'); // Foreign key to the form
            $table->string('type'); // Type of the form field (e.g., Text, Checkbox)
            $table->string('label'); // Label for the form field
            $table->string('placeholder')->nullable(); // Placeholder text for the form field, optional
            $table->text('options')->nullable(); // Options for the form field, stored as JSON, optional
            $table->boolean('required')->default(false); // Whether the form field is required or not
            $table->integer('order')->nullable(); // Order of the field in the form, optional
            $table->timestamps(); // Timestamps for creation and last update of the form field

            // Foreign key constraints
            $table->foreign('form_id')->references('id')->on('forms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_fields');
    }
};

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
        Schema::create('person', function (Blueprint $table) {
            $table->id();
            $table->string('lastname', 90);
            $table->string('firstname', 90);
            $table->string('middlename', 90);
            $table->string('suffix', 30);
            $table->integer('phone');
            $table->string('email')->unique();
            $table->integer('gender_id');
            $table->date('birthdate')->nullable();
            $table->string('birthplace', 100)->nullable();
            $table->integer('religion_id')->nullable();
            $table->timestamps();

            $table
                ->foreignId('address_id')
                ->nullable()
                ->constrained('address')
                ->onDelete('cascade')
                ->onUpdate('cascade')
                ->name('FK_address_foreign_key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('person');
    }
};

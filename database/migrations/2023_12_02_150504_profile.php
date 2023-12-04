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
        Schema::create('jobatho_profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jobatho_user_id')->constrained()->onDelete('cascade');
            $table->string('profession')->nullable();
            $table->integer('nid')->nullable();
            $table->string('image')->nullable();
            $table->longText('about')->nullable();
            $table->string('current_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('primary_contact')->nullable();
            $table->string('secendary_contact')->nullable();
            $table->string('ref')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

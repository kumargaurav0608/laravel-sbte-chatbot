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
        Schema::create('queries', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email');
        $table->string('mobilenumber');
        $table->text('usermessage');
        $table->string('referencenumber');
        $table->text('botmessage')->nullable()->default(null);
         $table->string('status')->nullable()->default(0);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queries');
    }
};

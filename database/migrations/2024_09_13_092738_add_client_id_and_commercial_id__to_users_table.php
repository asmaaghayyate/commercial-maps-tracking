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
        Schema::table('users', function (Blueprint $table) {
            
            $table->foreignId('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references("id")->on('clients')->onDelete('cascade');
          
            $table->foreignId('commercial_id')->unsigned()->nullable();
            $table->foreign('commercial_id')->references("id")->on('commercials')->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};

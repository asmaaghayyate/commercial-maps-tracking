<?php

use App\Models\User;
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
        Schema::create('commercials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            //
            $table->string('genre')->nullable();
            $table->string('phone')->nullable();
            $table->string('type_deplacement')->nullable();
            $table->string('identite')->nullable();
            $table->text('adresse')->nullable();
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->string('type_contrat')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commercials');
    }
};

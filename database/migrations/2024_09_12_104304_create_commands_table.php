<?php

use App\Models\Admin;
use App\Models\Client;
use App\Models\Commercial;
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
        Schema::create('commands', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Client::class)->onDelete('cascade')->nullable();
            $table->foreignIdFor(Commercial::class)->onDelete('cascade')->nullable();
            $table->foreignId('admin_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->enum('etat', ['initial', 'en cours', 'final'])->default('initial');

            $table->json('destination');
            $table->string('destination_name')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commands');
    }
};

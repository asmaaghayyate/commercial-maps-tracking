<?php

use App\Models\Departement;
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
        Schema::table('commercials', function (Blueprint $table) {
            $table->foreignIdFor(Departement::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commercials', function (Blueprint $table) {
            $table->dropForeign(['departement_id']);
        });
    }
};
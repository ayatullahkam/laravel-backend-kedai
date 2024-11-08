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
        Schema::table('model_has_roles', function (Blueprint $table) {
              // Mengubah kolom model_type untuk menambahkan default value
              $table->string('model_type')->default('App\Models\User')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('model_has_roles', function (Blueprint $table) {
              // Menghapus default value dari kolom model_type
              $table->string('model_type')->default(null)->change();
        });
    }
};

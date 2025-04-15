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
        Schema::table('commandes', function (Blueprint $table) {
            if (!Schema::hasColumn('commandes', 'prenom')) {
                $table->string('prenom')->nullable();
            }
            if (!Schema::hasColumn('commandes', 'email')) {
                $table->string('email')->nullable();
            }
            if (!Schema::hasColumn('commandes', 'adresse')) {
                $table->string('adresse')->nullable();
            }
            if (!Schema::hasColumn('commandes', 'ville')) {
                $table->string('ville')->nullable();
            }
            if (!Schema::hasColumn('commandes', 'code_postal')) {
                $table->string('code_postal')->nullable();
            }
            if (!Schema::hasColumn('commandes', 'total')) {
                $table->decimal('total', 8, 2)->nullable();
            }
        });
    }
    
    public function down(): void
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->dropColumn([
                'prenom',
                'email',
                'adresse',
                'ville',
                'code_postal',
                'total',
            ]);
        });
    }    
};

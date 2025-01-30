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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->string('slug', 100);
            $table->text('description')->nullable(true);
            $table->decimal('prix', 10, 2);
            $table->string('image')->nullable(true);
            $table->integer('stock')->nullable(false)->default(0);
            $table->foreignId('categorie_id')->constrained('categories');
            //$table->timestamps();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate(); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};

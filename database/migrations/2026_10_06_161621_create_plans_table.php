<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
{
    Schema::create('plans', function (Blueprint $table) {
    $table->id();
    $table->string('nombre')->unique();
    $table->decimal('monto_cobertura', 12, 2); // <--- Verificar este nombre
    $table->decimal('prima', 12, 2);
    $table->string('estatus')->default('activo');
    $table->timestamps();
});
}

    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};

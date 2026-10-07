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
    Schema::create('terceros', function (Blueprint $table) {
        $table->id();
        $table->enum('tipo_documento', ['V', 'E', 'J', 'G', 'P']);
        $table->string('numero_documento')->unique();
        $table->string('nombres');
        $table->string('apellidos');
        $table->string('telefono');
        $table->string('email')->unique();
        $table->text('direccion')->nullable();
        $table->enum('estatus', ['activo', 'inactivo'])->default('activo');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terceros');
    }
};

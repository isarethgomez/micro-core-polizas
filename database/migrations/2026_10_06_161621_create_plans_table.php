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
        $table->decimal('suma_asegurada', 20, 2);
        $table->decimal('costo_mensual', 20, 2);
        $table->enum('estatus', ['activo', 'inactivo'])->default('activo');
        $table->timestamps();
    });
}
    public function down(): void
    {
        Schema::table('plans', function (Blueprint $table) {
            if (Schema::hasColumn('plans', 'suma_asegurada')) {
                $table->renameColumn('suma_asegurada', 'monto_cobertura');
            }
            if (Schema::hasColumn('plans', 'costo_mensual')) {
                $table->renameColumn('costo_mensual', 'prima');
            }
        });
    }
};
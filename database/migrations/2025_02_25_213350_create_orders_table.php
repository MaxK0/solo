<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start');
            $table->dateTime('end');
            $table->foreignId('service_id')->constrained('services')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('employee_id')->nullable()
                ->constrained('employees')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('status')->default('Новый');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};

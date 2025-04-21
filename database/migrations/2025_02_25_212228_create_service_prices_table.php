<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('service_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('price');
            $table->foreignId('service_id')->constrained('services')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('employee_category_id')->constrained('employee_categories')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_prices');
    }
};

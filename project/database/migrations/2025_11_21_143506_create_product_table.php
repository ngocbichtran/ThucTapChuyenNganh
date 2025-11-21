<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
       public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('ID');

            // FK tới bảng categories
            $table->integer('CATE_ID')->unsigned();
            $table->foreign('CATE_ID')->references('ID')->on('categories')->onDelete('cascade');

            $table->string('TYPE', 100);
            $table->string('NAME', 255);
            $table->text('DESCRIPTION')->nullable();
            $table->string('IMG_URL')->nullable();
            $table->boolean('ACTIVE_FLAG')->default(1);

            $table->timestamp('CREATE_DATE')->nullable();
            $table->timestamp('UPDATE_DATE')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_info');
    }
};

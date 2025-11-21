<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
            public function up()
        {
            Schema::create('categories', function (Blueprint $table) {
                $table->increments('ID');
                $table->string('TYPE', 100)->unique();
                $table->text('DESCRIPTION')->nullable();
                $table->boolean('ACTIVE_FLAG')->default(1);
                $table->timestamp('CREATE_DATE')->nullable();
                $table->timestamp('UPDATE_DATE')->nullable();
            });
        }

        public function down()
        {
            Schema::dropIfExists('categories');
        }
};

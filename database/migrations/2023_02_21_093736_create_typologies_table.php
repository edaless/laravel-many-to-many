<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('typologies', function (Blueprint $table) {
            $table->id();

            $table->string('code', 8)->unique();
            $table->string('name', 32);
            $table->boolean('digital')->default(false);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('typologies');
    }
};

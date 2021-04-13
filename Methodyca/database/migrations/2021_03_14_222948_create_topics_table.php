<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $yearsadded = new DateInterval('P20Y');
        $expired_time = new DateTime();
        $expired_time->add($yearsadded);
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('');
            $table->text('description')->default('');
            $table->string('keywords')->default('');
            $table->timestamps();
            $table->date('expire')->default('2200-01-01');
            $table->string('name')->default('');
            $table->string('email')->default('');
            $table->unsignedInteger('popularity')->default(0);
            $table->boolean('agreement')->default(false);
            $table->boolean('visibility')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
    }
}

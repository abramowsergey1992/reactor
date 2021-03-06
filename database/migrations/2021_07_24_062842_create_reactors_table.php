<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reactors', function (Blueprint $table) {
            $table->id();
            $table->char('article')->unique();
            $table->char('name');
            $table->text('desc')->nullable();
            $table->char('type');
            $table->char('status');
            $table->integer('countmodules');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reactors');
    }
}

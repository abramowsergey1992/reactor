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
            $table->char('article');
            $table->char('name');
            $table->text('desc')->nullable();
            $table->char('type');
            $table->integer('statusmodules');
            $table->char('status');
            $table->integer('countmodules');
            $table->date('start')->nullable();
            $table->date('tempstart')->nullable();
            $table->date('tempfinish')->nullable();
            $table->date('finish')->nullable();

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

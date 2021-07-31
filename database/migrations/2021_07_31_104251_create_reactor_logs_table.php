<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReactorLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reactor_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('reactor_id');
            $table->char('action');
            $table->char('prev')->nullable();
            $table->char('now')->nullable();
            $table->char('constant')->nullable();
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
        Schema::dropIfExists('reactor_logs');
    }
}

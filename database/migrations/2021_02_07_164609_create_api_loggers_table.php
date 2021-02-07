<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiLoggersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_loggers', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('status');
            $table->string('tag');
            $table->string('uri', 1000);
            $table->string('method', 20)->nullable();
            $table->string('controller_action', 100)->nullable();
            $table->string('middleware')->nullable();
            $table->text('payload')->nullable();
            $table->string('duration')->nullable();
            $table->text('response')->nullable();
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
        Schema::dropIfExists('api_loggers');
    }
}

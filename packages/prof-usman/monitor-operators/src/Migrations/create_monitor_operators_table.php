<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitorOperatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('monitor_operators.table_name' , 'monitor_operators'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('operation');
            $table->morphs('operateable');
            $table->unsignedBigInteger('operator_id');
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
        Schema::dropIfExists(config('monitor_operators.table_name' , 'monitor_operators'));
    }
}

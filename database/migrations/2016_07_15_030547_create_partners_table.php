<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('link');
            $table->string('BOS_key');
            $table->text('description')->nullable();
            $table->integer('user_id');
            $table->timestamps();
        });

//        新建一个migration 然后用它删除表
//        Schema::table('partners', function (Blueprint $table) {
//            $table->drop();
//        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('partners');
    }
}

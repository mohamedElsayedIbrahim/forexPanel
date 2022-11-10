<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepoistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depoisters', function (Blueprint $table) {
            $table->id();
            $table->string('fullName',100);
            $table->string('account',16);
            $table->string('phone',11);
            $table->string('amount',100);
            $table->enum('type',['deposit','withdraw']);
            $table->string('status',100)->default('pending');
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
        Schema::dropIfExists('depoisters');
    }
}

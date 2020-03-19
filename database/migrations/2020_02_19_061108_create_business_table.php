<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('approved')->default(0);
            $table->text('logo')->nullable();
            $table->text('name')->nullable();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->text('map')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->text('hours')->nullable();
            $table->text('store')->nullable();

            // STUFF TO RE-ADD LATER
            //$table->text('tagline')->nullable();
            //$table->boolean('public_address')->default(0);
            //$table->text('fax')->nullable();
            //$table->text('linkedin')->nullable();
            //$table->text('instagram')->nullable();
            //$table->text('youtube')->nullable();
            //$table->text('twitter')->nullable();
            //$table->text('facebook')->nullable();
            //$table->text('rating')->nullable();
            //$table->set('type', ['small', 'large', 'freelance'])->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('businesses');
    }
}

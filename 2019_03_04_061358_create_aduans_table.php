<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aduans', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->index();

            $table->string('tajuk', 30);

            $table->text('aduan');

            $table->date('tarikh_aduan');

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
        Schema::dropIfExists('aduans');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailsStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails_stats', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id');
            $table->enum('type',['letter', 'link_1', 'link_2']);
            $table->string('hash', 32);
            $table->boolean('status_send_mail')->default(0);
            $table->boolean('status_open')->default(0);

            $table->timestamps();

            $table->index('hash');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mails_stats');
    }
}

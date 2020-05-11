<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('team1_id');
            $table->foreign('team1_id')->references('id')->on('teams')->onDelete('cascade');
            $table->unsignedBigInteger('team2_id');
            $table->foreign('team2_id')->references('id')->on('teams')->onDelete('cascade');
            $table->integer('match_point_team1')->nullable();
            $table->integer('match_point_team2')->nullable();
            $table->string('winner_team_id')->nullable();
            $table->date('match_date');
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
        Schema::dropIfExists('matches');
    }
}

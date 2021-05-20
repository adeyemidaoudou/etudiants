<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('civilite')->nullable();
            $table->text('nom')->nullable();
            $table->text('prenom')->nullable();
            $table->text('telephone')->nullable();
            $table->text('sexe')->nullable();
            $table->date('date_naissance')->nullable();
            $table->text('proces_verbal')->nullable();
            $table->text('marquette')->nullable();
            $table->text('diplome')->nullable();
            $table->text('releve_s1')->nullable();
            $table->text('releve_s2')->nullable();
            $table->text('releve_s3')->nullable();
            $table->text('releve_s4')->nullable();
            $table->text('releve_s5')->nullable();
            $table->text('releve_s6')->nullable();
            $table->text('releve_m1')->nullable();
            $table->text('releve_m2')->nullable();
            $table->text('releve_m3')->nullable();
            $table->text('releve_m4')->nullable();
            $table->boolean('statut_selection')->default(false);
            $table->boolean('statut_validation')->default(false);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dossiers');
    }
}

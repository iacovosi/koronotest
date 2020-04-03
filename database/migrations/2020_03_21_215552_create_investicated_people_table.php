<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvesticatedPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investicated_people', function (Blueprint $table) {
            $table->id();
            $table->integer("age")->nullable();
            $table->string("gender")->default("unknown");
            $table->string("unique_identification")->nullable()->default("unknown");            
            $table->integer("zipcode")->nullable();
            $table->string("country")->nullable()->default("unknown");
            $table->string("flight_country")->nullable()->default("unknown");
            $table->boolean("vulnerable_group")->default(0);
            $table->boolean("malaise")->default(0);
            $table->boolean("fever")->default(0);
            $table->boolean("cough")->default(0);
            $table->boolean("myalgia")->default(0);
            $table->boolean("loss_of_taste")->default(0);
            $table->boolean("loss_of_smell")->default(0);
            $table->boolean("breathing_difficulties")->default(0);
            $table->boolean("other_symptom")->default(0);
            $table->boolean("flight_recently")->default(0);
            $table->boolean("covid_19_contact")->default(0);
            $table->boolean("chest_pain")->default(0);
            $table->boolean("nothing")->default(0);
            $table->float("lat")->nullable();
            $table->float("long")->nullable();
            $table->string("result")->nullable();
            $table->string("ip")->nullable();
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
        Schema::dropIfExists('investicated_people');
    }
}

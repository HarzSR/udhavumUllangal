<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->string("serial");
            $table->string("company")->default("self");
            $table->string("name");
            $table->string("number");
            $table->string("gender");
            $table->date("dob")->nullable();
            $table->string("email")->nullable();
            $table->string("pan")->nullable();
            $table->string("aadhar")->nullable();
            $table->string("address", 5000)->nullable();
            $table->string("reference");
            $table->longText("notes")->nullable();
            $table->date("since")->nullable();
            $table->string("otherName")->nullable();
            $table->string("otherNumber")->nullable();
            $table->string("otherEmail")->nullable();
            $table->string("otherAlternative")->nullable();
            $table->string("type");
            $table->tinyInteger("status")->default(1);
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
        Schema::dropIfExists('donors');
    }
}

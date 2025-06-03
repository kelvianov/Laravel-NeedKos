<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenderToKosTable extends Migration
{
    public function up()
    {
        Schema::table('kos', function (Blueprint $table) {
            $table->string('gender')->default('mixed')->after('description');
        });
    }

    public function down()
    {
        Schema::table('kos', function (Blueprint $table) {
            $table->dropColumn('gender');
        });
    }
}

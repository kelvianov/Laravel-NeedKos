<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToKosTable extends Migration
{
    public function up()
    {
        Schema::table('kos', function (Blueprint $table) {
            $table->foreignId('user_id')->after('contact_person')->constrained()->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('kos', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}

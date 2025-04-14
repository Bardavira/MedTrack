<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('medical_records', function(Blueprint $table) {
            $table->renameColumn('fist_name', 'first_name');
        });
    }


    public function down()
    {
        Schema::table('medical_records', function(Blueprint $table) {
            $table->renameColumn('first_name', 'fist_name');
        });
    }
};

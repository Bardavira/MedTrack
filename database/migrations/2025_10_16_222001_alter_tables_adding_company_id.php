<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->after('unit_id');
            $table->index('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
        Schema::table('ubs_wings', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->after('id');
            $table->index('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
        Schema::table('ubs_units', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->after('id');
            $table->index('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
        Schema::table('medical_records', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->after('id');
            $table->index('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });
        Schema::table('ubs_units', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });
        Schema::table('ubs_wings', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });
        Schema::table('medical_records', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('admin_profiles', function (Blueprint $table) {
            $table->string('name')->nullable(); // Adding the 'name' column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_profiles', function (Blueprint $table) {
            $table->dropColumn('name'); // If you ever need to rollback, this will drop the 'name' column
        });
    }
};

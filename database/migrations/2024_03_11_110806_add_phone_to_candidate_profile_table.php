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
        Schema::table('candidate_profile', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('availability'); // Add the new 'phone' column after the 'availability' column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidate_profile', function (Blueprint $table) {
            $table->dropColumn('phone'); // If you ever need to rollback, this will drop the 'phone' column
        });
    }
};

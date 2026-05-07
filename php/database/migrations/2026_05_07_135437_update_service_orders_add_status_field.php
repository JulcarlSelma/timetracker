<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_orders', function (Blueprint $table) {
            $table->enum('status', ['OPEN', 'CLOSED'])->nullable()->default('OPEN')->after('done_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('service_orders', 'status')) {
            Schema::table('service_orders', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }
    }
};

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
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_no')->nullable()->unique();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('assigned_employee_id')->nullable();
            $table->date('requested_date');
            $table->longText('complain_or_request');
            $table->longText('jobs_done')->nullable();
            $table->longText('findings')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('printed_name')->nullable();
            $table->date('done_date')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign Key
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('assigned_employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_orders');
    }
};

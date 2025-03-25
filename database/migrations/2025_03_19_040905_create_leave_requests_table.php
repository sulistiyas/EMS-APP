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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id('id_leave_request');
            $table->bigInteger('id_employee')->unsigned();
            $table->foreign('id_employee')->references('id_employee')->on('employees')->onDelete('cascade');
            $table->bigInteger('id_leave_type')->unsigned();
            $table->foreign('id_leave_type')->references('id_leave_type')->on('leave_types')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('days');
            $table->string('reason');
            $table->string('status');
            $table->string('approved_by')->nullable();
            $table->date('approved_at')->nullable();
            $table->string('rejected_by')->nullable();
            $table->date('rejected_at')->nullable();
            $table->string('canceled_by')->nullable();
            $table->date('canceled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};

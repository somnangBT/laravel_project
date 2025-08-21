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
       Schema::create('students', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email');
    $table->date('date_of_birth');
    $table->unsignedBigInteger('major_id'); // ✅ No 'after'
    $table->timestamps();

    $table->foreign('major_id')->references('id')->on('majors')->onDelete('cascade');
});
    }

    public function down()
    {
        Schema::dropIfExists('subjects');
    }
};

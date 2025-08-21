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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // This creates an auto-incrementing primary key
            $table->string('title');
            $table->string('name');
            $table->text('content');
            $table->text('category');
            $table->string('province');
            $table->string('image')->nullable(); // Nullable if no image is uploaded
            $table->unsignedBigInteger('member_id')->nullable();
             // Foreign key for member_id, nullable if not used
            $table->timestamps();
        });
    }
public function down()
{
    Schema::dropIfExists('posts');
}

};

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
        // Check if the 'province' column already exists in the 'posts' table
        if (!Schema::hasColumn('posts', 'province')) {
            Schema::table('posts', function (Blueprint $table) {
                // Add the 'province' column after 'category' column
                $table->string('province')->after('category')->nullable(false)->default('');
            });
        }
    }

    public function down()
    {
        // Check if the 'province' column exists before dropping it
        if (Schema::hasColumn('posts', 'province')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->dropColumn('province');
            });
        }
    }
};

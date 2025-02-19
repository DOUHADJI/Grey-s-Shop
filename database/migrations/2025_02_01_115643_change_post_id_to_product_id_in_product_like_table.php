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
        Schema::table('product_likes', function (Blueprint $table) {
            $table->dropConstrainedForeignId('post_id') ;
            $table->foreignId("product_id")->constrained("id")->on("articles");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_likes', function (Blueprint $table) {
            //
        });
    }
};

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
        Schema::table('projects', function (Blueprint $table) {
           //create the column that wil hold a foreign key
            $table->unsignedBigInteger('category_id')->nullable()->after('id');

           $table->foreign('category_id')
           ->references('id')
           ->on('categories')
           ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //1.Drop the foreign
            $table->dropForeign('post_category_id_foreign');
              // 2.Drop the column
            $table->dropColumn('category_id');  
        });
    }
};

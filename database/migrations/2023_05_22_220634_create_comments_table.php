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
        

        // if(!Schema::hasTable('comments')){
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('blog_id')->references('id')->on('blogs')->cascadeOnDelete();
            // $table->foreignId('user_id');
            // $table->foreignId('blog_id')->references('id')->on('blogs')->cascadeOnDelete();
            // Schema::enableForeignKeyConstraints();
            
            // Schema::disableForeignKeyConstraints();

            $table->timestamps();
        });
    // Schema::table('comments', function (Blueprint $table){
       
    // });
   
    
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
        // $table->dropForeign('comments_blog_id_foreign');
    }
};

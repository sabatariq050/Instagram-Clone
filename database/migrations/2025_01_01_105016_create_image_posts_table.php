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
        Schema::create('image_posts', function (Blueprint $table) {
            $table->id();  
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();  // Link the post to the user
            $table->string('image');  // The image path
            $table->text('caption')->nullable();  // Optional caption for the image
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_posts');
    }
};

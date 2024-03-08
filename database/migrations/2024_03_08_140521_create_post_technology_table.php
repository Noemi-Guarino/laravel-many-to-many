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
        Schema::create('post_technology', function (Blueprint $table) {
            // $table->id();lo togliamo perchè vogliamo solo post id e technology id
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onUpdate('cascade')
                ->onDelete('cascade');

                $table->unsignedBigInteger('technology_id');
                $table->foreign('technology_id')
                ->references('id')
                ->on('technologies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                //abbiamo creato la tabella ponte con entrambi gli id collegati

                $table->primary(['post_id', 'technology_id']); //come se fosse un salvataggio

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_technology');
    }
};

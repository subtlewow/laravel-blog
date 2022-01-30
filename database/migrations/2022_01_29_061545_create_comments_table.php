<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            // when declaring foreign id's make sure its an unsignedBigInteger as id is unsigned big int (use foreignId) (ie. id cannot be negative, only positive)
            $table->id();

            // TLDR: define a foreign id, call the constrained() function which handles what column and table to reference and if a row is deleted, cascade the delete across the respective tables based on the id
            // constrained() handles what column and what table to reference

            // when row in comments table deleted, delete the associated POST from the posts table related to that id
            $table->foreignId('posts_id')->constrained()->cascadeOnDelete();

            // when row in comments table deleted, delete the associated USER from the users table
            $table->foreignId('users_id')->constrained()->cascadeOnDelete();
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}

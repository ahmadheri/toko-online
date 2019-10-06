<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('description');
            $table->string('author');
            $table->string('publisher');
            $table->string('cover');
            $table->float('price');
            $table->bigInteger('views')->default(0)->unsigned();
            $table->bigInteger('stock')->default(0)->unsigned();
            $table->enum('status',['PUBLISH','DRAFT']);
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by')->nullable();
            $table->bigInteger('deleted_by')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('books');
    }
}

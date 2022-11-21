<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeranstaltungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veranstaltungs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('url');
            $table->text('thumbnail');
            $table->text('title');
            $table->text('ticketsalestart');
            $table->text('ticketsaleend');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veranstaltungs');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTableMigration extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('position', false, true);
            $table->integer('real_depth', false, true);
            $table->softDeletes();

            $table->foreign('parent_id')
                ->references('id')
                ->on('pages')
                ->onDelete('set null');
        });

        Schema::create('page_closure', function (Blueprint $table) {
            $table->increments('closure_id');

            $table->integer('ancestor', false, true);
            $table->integer('descendant', false, true);
            $table->integer('depth', false, true);

            $table->foreign('ancestor')
                ->references('id')
                ->on('pages')
                ->onDelete('cascade');

            $table->foreign('descendant')
                ->references('id')
                ->on('pages')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('page_closure', function (Blueprint $table) {
            Schema::dropIfExists('page_closure');
        });

        Schema::table('pages', function (Blueprint $table) {
            Schema::dropIfExists('pages');
        });
    }
}

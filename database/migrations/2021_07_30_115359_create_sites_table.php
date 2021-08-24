<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('google_drive_url')->nullable();
            $table->text('google_drive_id')->nullable();
            $table->string('build_status')->default('');
            $table->timestamp('build_status_changed_at')->nullable();
            $table->text('build_output')->nullable();
            $table->text('serve_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}

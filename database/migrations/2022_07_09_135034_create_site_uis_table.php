<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_uis', function (Blueprint $table) {
            $table->id();
            $table->string('banner')->nullable();
            $table->string('logo')->nullable();
            $table->string('footerText')->nullable();
            $table->string('FcopyText')->nullable();
            $table->string('FSkype')->nullable();
            $table->string('FGithub')->nullable();
            $table->string('FWhatsapp')->nullable();
            $table->string('Flinkedin')->nullable();
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
        Schema::dropIfExists('site_uis');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMobilesTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mobiles', function (Blueprint $table) {
            $table->string('main_camera_pixels_description')->nullable();
            $table->string('main_ram_description')->nullable();
            $table->string('main_battery_description')->nullable();
            $table->string('main_price_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mobiles', function (Blueprint $table) {
            $table->dropColumn('main_camera_pixels_description');
            $table->dropColumn('main_ram_description');
            $table->dropColumn('main_battery_description');
            $table->dropColumn('main_price_description');
        });
    }
}

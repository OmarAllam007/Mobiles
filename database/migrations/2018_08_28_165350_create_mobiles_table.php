<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image_path')->nullable();
            $table->text('description')->nullable();
            $table->string('released_date')->nullable();
            $table->string('operating_system')->nullable();
            $table->string('device_dimension')->nullable();
            $table->string('device_weight')->nullable();
            $table->string('device_m_o_m')->nullable();
            $table->integer('device_number_of_sims')->nullable();
            $table->string('device_size_of_sim')->nullable();
            $table->string('processor')->nullable();
            $table->string('chipset')->nullable();
            $table->string('graphical_processor')->nullable();
            $table->string('internal_storage')->nullable();
            $table->text('ram')->nullable();
            $table->text('external_storage')->nullable();
            $table->float('screen_size')->nullable();
            $table->float('screen_size_percentage')->nullable();
            $table->string('screen_resolution')->nullable();
            $table->string('screen_dimensions')->nullable();
            $table->string('screen_density_of_pixels')->nullable();
            $table->string('screen_technology')->nullable();
            $table->string('screen_colors')->nullable();
            $table->string('screen_touch_features')->nullable();
            $table->string('screen_protection')->nullable();
            $table->string('screen_extra_features')->nullable();
            $table->string('camera_main_camera')->nullable();
            $table->string('camera_flash')->nullable();
            $table->string('camera_lens_aperture')->nullable();
            $table->string('camera_focal_length')->nullable();
            $table->string('camera_sensor_size')->nullable();
            $table->text('camera_other_features')->nullable();
            $table->string('camera_video')->nullable();
            $table->string('camera_front_camera')->nullable();
            $table->string('camera_front_camera_features')->nullable();
            $table->string('battery_type')->nullable();
            $table->string('battery_calls_until')->nullable();
            $table->string('battery_music_until')->nullable();
            $table->string('battery_video_until')->nullable();
            $table->tinyInteger('battery_is_removable')->nullable();
            $table->string('communication_network')->nullable();
            $table->string('communication_bluetooth')->nullable();
            $table->string('communication_wifi')->nullable();
            $table->string('communication_hotspot')->nullable();
            $table->string('communication_nfc')->nullable();
            $table->string('communication_usb')->nullable();
            $table->string('communication_otg')->nullable();
            $table->string('communication_ir')->nullable();
            $table->tinyInteger('media_radio_exist')->nullable();
            $table->string('media_speaker')->nullable();
            $table->tinyInteger('media_is_35_mm_slot')->nullable();
            $table->string('others_open_device')->nullable();
            $table->string('others_gps')->nullable();
            $table->string('others_sensors')->nullable();
            $table->tinyInteger('others_vr_support')->nullable();
            $table->tinyInteger('others_notification_led_support')->nullable();
            $table->tinyInteger('others_additional_microphone_exist')->nullable();
            $table->string('colors')->nullable();
            $table->string('price')->nullable();
            $table->text('url_souq')->nullable();
            $table->text('url_jumia')->nullable();
            $table->text('url_amazon')->nullable();
            $table->tinyInteger('available_in_egypt')->nullable();
            $table->integer('brand_id')->nullable();
            $table->tinyInteger('is_online')->nullable();
            $table->text('keywords')->nullable();
            $table->string('main_camera_pixels_description')->nullable();
            $table->string('main_ram_description')->nullable();
            $table->string('main_battery_description')->nullable();
            $table->string('main_price_description')->nullable();
            $table->text('pros')->nullable();
            $table->text('cons')->nullable();
            $table->integer('number_of_hits')->nullable();
            $table->integer('number_of_fans')->nullable();
            $table->text('advertisements')->nullable();
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
        Schema::dropIfExists('mobiles');
    }
}

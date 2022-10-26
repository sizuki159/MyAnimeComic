<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->longText('image')->default('');
            $table->string('url');
            $table->unsignedInteger('priority')->default(0);
            $table->string('status');
            $table->timestamps();
        });


        // Create dafault 2 slider
        DB::table('sliders')->insert([
            'title' => 'Detective Conan: Halloween Bride 2022',
            'description' => 'During the wedding of Takagi and Sato, an assailant breaks and tries to attack Sato...',
            'image' => "data:image/png;base64," . base64_encode(file_get_contents(public_path('images/slider/conan.jpg'))),
            'url' => '#',
            'priority' => '1',
            'status' => 'active',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
        ]);

        DB::table('sliders')->insert([
            'title' => 'Fate / Stay Night: Unlimited Blade Works',
            'description' => 'After 30 days of travel across the world...',
            'image' => "data:image/png;base64," . base64_encode(file_get_contents(public_path('images/slider/hero-1.jpg'))),
            'url' => '#',
            'priority' => '2',
            'status' => 'active',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}

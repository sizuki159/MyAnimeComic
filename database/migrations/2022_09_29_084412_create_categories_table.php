<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


use Illuminate\Support\Str;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 65535)->unique();
            $table->string('slug', 65535)->unique();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        $categories = ["Action", "Adventure", "Anime", "Chuyển Sinh", "Cổ Đại", "Comedy", "Comic", "Demons", "Detective", "Doujinshi", "Drama", "Fantasy", "Gender Bender", "Harem", "Historical", "Horror", "Huyền Huyễn", "Isekai", "Josei", "Mafia", "Magic", "Manhua", "Manhwa", "Martial Arts", "Military", "Mystery", "Ngôn Tình", "One shot", "Psychological", "Romance", "School Life", "Sci-fi", "Seinen", "Shoujo", "Shoujo Ai", "Shounen", "Shounen Ai", "Slice of life", "Sports", "Supernatural", "Tragedy", "Trọng Sinh", "Truyện Màu", "Webtoon", "Xuyên Không"];
        foreach ($categories as $key => $value) {
            DB::table('categories')->insert([
                'name' => $value,
                'slug' => Str::slug($value),
                "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}

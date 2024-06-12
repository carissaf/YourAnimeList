<?php

namespace Database\Seeders;

use App\Models\Anime;
use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rating::factory(10)->create();

        $animes = Anime::all();
        foreach($animes as $anime){
            $anime_id = $anime->anime_id;
            $averageRating = Rating::where('anime_id', $anime_id)->avg('rating');

            if($averageRating){
                Anime::where('anime_id', $anime_id)->update(['rating' => $averageRating]);
            }
        }

    }
}

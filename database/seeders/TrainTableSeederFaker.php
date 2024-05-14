<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Train;
use Illuminate\Support\Str;

class TrainTableSeederFaker extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $new_train = new Train();
            $new_train->company = $faker->words(2, true);
            $new_train->slug = $this->generateSlug($new_train->company);
            $new_train->departure_station = $faker->city;
            $new_train->arrival_station = $faker->city;
            $new_train->departure_time = $faker->time;
            $new_train->arrival_time = $faker->time;
            $new_train->train_code = $faker->numberBetween(100000000000, 999999999999);
            $new_train->carriage_number = $faker->numberBetween(1, 15);

            $new_train->save();
        }
    }

    private function generateSlug($string)
    {
        $slug = Str::slug($string, '-');
        $original_slug = $slug;

        $exist = Train::where('slug', $slug)->first();
        $counter = 1;

        while ($exist) {
            $slug = $original_slug . '-' . $counter;
            $exist = Train::where('slug', $slug)->first();
            $counter++;
        }
        return $slug;
    }
}

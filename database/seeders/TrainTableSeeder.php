<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Illuminate\Support\Str;

class TrainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Logica per popolare la tabella


        $new_train = new Train();
        $new_train->slug = $this->generateSlug($new_train->train_code);
        $new_train->company = 'FS Ferrovie';
        $new_train->departure_station = 'Milano';
        $new_train->arrival_station = 'Napoli';
        $new_train->departure_time = '12:30';
        $new_train->arrival_time = '16:30';
        $new_train->train_code = 'MJ45G8W223';
        $new_train->carriage_number = '3';

        $new_train->save();
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

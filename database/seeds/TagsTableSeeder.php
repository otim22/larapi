<?php

use Illuminate\Database\Seeder;

use App\Tag;
use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
 
        foreach (range(1, 10) as $index) {
        	Tag::create([
        		'name' => $faker->word
    		]);
        }
    }
}

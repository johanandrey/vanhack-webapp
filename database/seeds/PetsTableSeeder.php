<?php

use Illuminate\Database\Seeder;

class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pets = [ 'Cats', 'Dogs'];
        foreach ($pets as $pet){
            DB::table('pets')->insert([
                'pet' => $pet,
            ]);
        }
    }
}

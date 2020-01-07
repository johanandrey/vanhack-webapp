<?php

use Illuminate\Database\Seeder;

class PreferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Johan',
            'Andrey',
            'Diana',
            'Marcela',
            'John',
            'Smith'
        ];
        foreach($names as $name) {
            $p = new App\Preference();
            $p->name = $name;
            $p->pet_id = rand(1,2);
            $p->color_id = rand(1,11);
            $p->save();
        }
    }
}

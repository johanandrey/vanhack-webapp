<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [ 
                    'white',
                    'yellow',
                    'blue',
                    'red',
                    'orange',
                    'black',
                    'cyan',
                    'green',
                    'purple',
                    'brown',
                    'azure'
        ];
        foreach ($colors as $color){
            $save = DB::table('colors')->insert([
                'color' => $color,
            ]);
            echo "b: $save;";
        }

    }
}

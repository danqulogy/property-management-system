<?php

use Illuminate\Database\Seeder;

class PropertyTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property_types')->insert(array(
           [
               'name' => 'Building'
           ],
            [
                'name' => 'Store'
            ],
            [
                'name' => 'Land'
            ],
            [
                'name' => 'Hotel'
            ],
            [
                'name' => 'School'
            ],
            [
                'name' => 'Supermarket'
            ],
            [
                'name' => 'Studio'
            ],
            [
                'name' => 'Hostel'
            ],
            [
                'name' => 'Petrol Station'
            ],
            [
                'name' => 'Office Space'
            ],
            [
                'name' => 'Bar'
            ],[
                'name' => 'Restaurant'
            ],
            [
                'name' => 'Warehouse'
            ]
        ));
    }
}

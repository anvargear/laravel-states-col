<?php

use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the countries table
        DB::table(\Config::get('colombia.table_name'))->delete();

        //Get all of the countries
        $states = States::getList();
        foreach ($states as $stateId => $state){
            DB::table(\Config::get('colombia.table_name'))->insert(array(
                'id' => $stateId,
                'name' => ((isset($state['name'])) ? $state['name'] : null),
                'iso_3166_2' => $state['iso_3166_2'],
                'iso_3166_3' => $state['iso_3166_3'],
                'capital' => ((isset($state['capital'])) ? $state['capital'] : null),
                'dane_code' => $state['dane_code'],
                'region' => ((isset($state['region'])) ? $state['region'] : null),
            ));
        }
    }
}

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
        DB::table(\Config::get('colombia.table_departament'))->delete();

        //Get all of the countries
        $states = States::getList();
        foreach ($states as $stateId => $state){
            DB::table(\Config::get('colombia.table_departament'))->insert(array(
                'id' => $stateId,
                'name' => ((isset($state['name'])) ? $state['name'] : null),
                'iso_3166_2' => $state['iso_3166_2'],
                'iso_3166_3' => $state['iso_3166_3'],
                'capital' => ((isset($state['capital'])) ? $state['capital'] : null),
                'dane_code' => $state['dane_code'],
                'region' => ((isset($state['region'])) ? $state['region'] : null),
            ));
        }

        DB::table(\Config::get('colombia.table_cities'))->delete();
        $cities = Cities::getList();
        foreach ($cities as $city){
            DB::table(\Config::get('colombia.table_cities'))->insert(array(
                'name' => ((isset($city['name'])) ? $city['name'] : null),
                'iso_3166_3' => $city['iso_3166_3'],
                'dane_code' => $city['dane_code'],
                'departament_id' =>   $city['departament_id'],
            ));
        }
    }
}
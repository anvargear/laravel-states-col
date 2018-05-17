<?php

namespace AnvarGear\cities;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{

    /**
     * @var string
     * Path to the directory containing cities data.
     */
    protected $cities = [];

    /**
     * @var string
     * The table for the countries in the database, is "cities" by default.
     */
    protected $table;

    /**
     * Constructor.
     *
     */
    public function __construct()
    {
        $this->table = \Config::get('colombia.table_cities');
    }

    /**
     * Get the cities from the JSON file, if it hasn't already been loaded.
     *
     * @return array
     */
    protected function getCities()
    {
        //Get the cities from the JSON file
        if (sizeof($this->cities) == 0) {
            $this->cities = json_decode(file_get_contents(__DIR__ . '/Models/cities.json'), true);
        }
        //Return the cities
        return $this->cities;
    }

    /**
     * Returns one city
     *
     * @param string $id The city id
     *
     * @return array
     */
    public function getOne($id)
    {
        $cities = $this->getCities();
        return $cities[$id];
    }

    /**
     * Returns a list of cities
     *
     * @param string sort
     *
     * @return array
     */
    public function getList($sort = null)
    {
        //Get the cities list
        $cities = $this->getCities();

        //Sorting
        $validSorts = [
            'name',
            'iso_3166_3',
            'dane_code',
            'departament_id',
        ];

        if (! is_null($sort) && in_array($sort, $validSorts)) {
            uasort($cities, function ($a, $b) use ($sort) {
                if (!isset($a[$sort]) && !isset($b[$sort])) {
                    return 0;
                } elseif (!isset($a[$sort])) {
                    return -1;
                } elseif (!isset($b[$sort])) {
                    return 1;
                } else {
                    return strcasecmp($a[$sort], $b[$sort]);
                }
            });
        }

        //Return the cities
        return $cities;
    }

    /**
     * Returns a list of countries suitable to use with a select element in Laravelcollective\html
     * Will show the value and sort by the column specified in the display attribute
     *
     * @param string display
     *
     * @return array
     */
    public function getListForSelect($display = 'name')
    {
        foreach ($this->getList($display) as $key => $value) {
            $cities[$key] = $value[$display];
        }
        //return the array
        return $cities;
    }
}
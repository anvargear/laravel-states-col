
use Illuminate\Database\Migrations\Migration;

class SetupStatesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creates the states table
        Schema::create(\Config::get('colombia.table_departament'), function($table)
        {
            $table->integer('id')->index();
            $table->string('name', 255)->default('');
            $table->char('iso_3166_2', 2)->default('')->nullable();
            $table->char('iso_3166_3', 3)->default('');
            $table->string('capital', 255)->default('');
            $table->char('country_code', 2)->default('CO');
            $table->string('dane_code', 2)->default('')->nullable();
            $table->string('region', 255)->default('')->nullable();
            $table->timestamps();
            $table->primary('id');
        });

        // Creates the cities table
        Schema::create(\Config::get('colombia.table_cities'), function($table)
        {
            $table->increments('id');
            $table->string('name', 255)->default('');
            $table->char('iso_3166_3', 3)->default('')->nullable();
            $table->string('dane_code', 2)->default('')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop(\Config::get('colombia.table_cities'));
        Schema::drop(\Config::get('colombia.table_departament'));
    }

}
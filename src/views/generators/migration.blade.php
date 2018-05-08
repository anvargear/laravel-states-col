

use Illuminate\Database\Migrations\Migration;

class SetupStatesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creates the users table
        Schema::create(\Config::get('states.table_name'), function($table)
        {
            $table->integer('id')->index();
            $table->string('name', 255)->default('');
            $table->string('iso_3166_2', 2)->default('')->nullable();
            $table->string('iso_3166_3', 3)->default('');
            $table->string('capital', 255)->default('');
            $table->string('country_code', 2)->default('CO');
            $table->string('dane_code', 2)->default('')->nullable();
            $table->string('region', 255)->default('')->nullable();
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop(\Config::get('states.table_name'));
    }

}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('employees', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

        $createTableEmployeeString = "CREATE TABLE employees (
            employee_id int NOT NULL AUTO_INCREMENT,
            employee_name varchar(255) NOT NULL,
            employee_manager_id INT,
            created_at datetime default now(),
            updated_at datetime,
            PRIMARY KEY (employee_id)
        );";

        DB::statement($createTableEmployeeString);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}

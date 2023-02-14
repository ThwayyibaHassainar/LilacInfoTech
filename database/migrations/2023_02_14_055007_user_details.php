<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('name');

            $table->unsignedBigInteger('fk_Department')->nullable();
            $table->foreign('fk_Department')->references('department_id')->on('Department');

            $table->unsignedBigInteger('fk_Designation')->nullable();
            $table->foreign('fk_Designation')->references('designation_id')->on('Designation');

            $table->bigInteger('phone_number');

            $table->timestamps();
        });

        $seeder=new \Database\Seeders\DesignationSeeder();
        $seeder->run();

        $seeder2=new \Database\Seeders\DepartmentSeeder();
        $seeder2->run();

        $seeder3=new \Database\Seeders\UserSeeder();
        $seeder3->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};

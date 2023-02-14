<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designationid=DB::table('Designation')->pluck('designation_id');
        $departmentid=DB::table('Department')->pluck('department_id');
        DB::table('user')->insert([
                [
                    'name' => 'Rahul','fk_Department'=>'1','fk_Designation'=>'1','phone_number'=>'34458877'
                ],
                [
                    'name' => 'Sarath','fk_Department'=>'2','fk_Designation'=>'2','phone_number'=>'3456777'
                ],
                [
                    'name' => 'Jishnu','fk_Department'=>'1','fk_Designation'=>'2','phone_number'=>'87646775'
                ],
                [
                    'name' => 'Zainudheen ','Incom tax department'=>'1','fk_Designation'=>'2','phone_number'=>'6765438798'
                ],
            ]
        );
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Employee extends Controller
{
    public function index(){
        $users = DB::table('user')->join('Department','user.fk_Department','=','Department.department_id')->
        join('Designation','user.fk_Designation','=','Designation.designation_id')->get();
        return view('view',['users'=>$users]);
    }
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $users = DB::table('user')->join('Department','user.fk_Department','=','Department.department_id')->
                join('Designation','user.fk_Designation','=','Designation.designation_id')->
            where('user.name', 'LIKE', '%' . $request->search . "%")->get();
            if ($users) {
                foreach ($users as $key => $user) {

                   $output.=' <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                                    <div class="grid grid-cols-1 md:grid-cols-2">
                                         
                                            <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                                                <div class="items-center">
                                                     <td>'.$user->name.'</td><br>
                                                       <td>'.$user->department_name.'</td><br>
                                                    <td>'.$user->designation_name.'</td>
                                                </div>

                                           
                                        </div>
                                       



                                    </div>
                                </div>
        ';
                }
                return Response($output.' <div class="blog-author d-flex align-items-center">
                        <img src="assets/img/blog/blog-author.jpg" class="rounded-circle float-left" alt="">
                        <div>
                            <h4>All Rights Reserved to</h4>

                            <p>
                               Lilac Infotech Private Limited, KSITIL Special Ecnomic Zone, Seond Floor, Sahya Govt Cyber Park, Calict - 673016, Kerala, India</p>
                        </div>
                    </div>');
            }
        }
    }
}
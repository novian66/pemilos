<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Admin\School;
use App\Models\Admin\School_group;
use App\Models\Admin\UserJoinSchool;
use App\Models\User;
use App\Utils\RandomStringGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Rap2hpoutre\FastExcel\FastExcel;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class ExcellController extends Controller
{
    public function export_user()
    {
        $school = School::where('user_id', auth()->user()->id)->first();
        // $data = UserJoinSchool::with('user')->where('school_id', $school->id)->get();


        $data = User::select('users.*', 'user_join_schools.school_id','school_groups.name as group_name')
        ->leftjoin('user_join_schools', 'user_join_schools.user_id', '=', 'users.id')
        ->leftjoin('school_groups', 'school_groups.id', '=', 'users.school_group_id')
        ->where(['user_join_schools.school_id' => $school->id])
        ->get();
        // $data = collect([
        //     [ 'id' => 1, 'name' => 'Jane' ],
        //     [ 'id' => 2, 'name' => 'John' ],
        // ]);
        // dd($data);

        if (count($data) <= 0) {
            # code...
            return back()->with('error', 'Pengguna Tidak tersedia');
        } else {
            # code...
            $text = "Rekap Pengguna " . $school->nama . ".xlsx";
            return (new FastExcel($data))->download($text, function ($user) {
                return [
                    'Nomor Induk' => $user->nisn,
                    'Akun Email' => $user->email,
                    'Nama Lengkap' => $user->name,
                    'L/P' => $user->jenis_kelamin,
                    'Kelompok' => $user->group_name,
                    'Sandi' => $user->token
                ];
            });
        }
    }

    public function import_user(Request $request)
    {
        $request->validate([
            'berkas' => 'required|file|mimes:xlsx'
        ], [
            'berkas.required' => 'Excel Belum diupload',
            'berkas.file' => 'Harus berupa file',
            'berkas.mimes' => 'hanya boleh format csv atau xlsx'
        ]);
        // (new FastExcel)->import($request->berkas, function ($line) {
            // $data = $line;
            
            // $token = (new RandomStringGenerator)->generate(6);
            // $user = User::create([
            //     'name' => $line['NAME'],
            //     'email' => $line['NISN/NIP'] . "@" . str_replace(' ', '', $line['SCHOOL']) . ".ac.id",
            //     'password' => Hash::make($token),
            //     'token' => $token,
            //     'nisn' => $line['NISN/NIP'],
            //     'type' => $line['TYPE'],
            //     'jenis_kelamin' => $line['L/P'],
            // ]);

            // $school = School::where('user_id', auth()->user()->id)->first();
            // $role = Role::whereName('student')->first();
            // $permission = Permission::where(['name' => 'student-access'])->pluck('id');
            // $role->syncPermissions($permission);
            // $user->assignRole([$role->id]);
            // UserJoinSchool::create([
            //     'user_id' => $user->id,
            //     'school_id' => $school->id,
            //     'status' => 'enable'
            // ]);
        // });

        $collection = (new FastExcel)->import($request->berkas);
        $data = array();
        // dd($collection);
        $check = School::where(['user_id' => auth()->user()->id])->first();
        // dd($check);
        $is_valid = 'true';
        for($a=0;$a<count($collection);$a++){
            $data[$a] = $collection[$a];
            $data[$a]['number'] = $a+2;

            //check duplicate
            $user = User::select('users.*', 'user_join_schools.school_id')
            ->leftjoin('user_join_schools', 'user_join_schools.user_id', '=', 'users.id')
            ->where(['nisn' => $collection[$a]['number_id']])
            ->where(['school_id' => $check->id])
            ->get();
            
            if(!isset(($user[0]))){
            $data[$a]['is_not_duplicate'] = 'true';
            $data[$a]['is_not_duplicate_status_name'] = '';
            $data[$a]['is_not_duplicate_status_color'] = '';    
            }
            else{
            $data[$a]['is_not_duplicate'] = 'false';
            $data[$a]['is_not_duplicate_status_name'] = 'error';
            $data[$a]['is_not_duplicate_status_color'] = 'bg-red';
            $is_valid = 'false';
            }
            // DB::enableQueryLog();
            //check user_group
            $user_group = School_group::where(['code' => $collection[$a]['user_group']])
            ->where(['school_id' => $check->id])
            ->get();
            // dd(DB::getQueryLog());
            // dd($user_group);
            if(isset(($user_group[0])))
            {
                $data[$a]['is_user_group_available'] = 'true';
                $data[$a]['is_user_group_available_status_name'] = '';
                $data[$a]['is_user_group_available_status_color'] = '';                
            }
            else
            {
            $data[$a]['is_user_group_available'] = 'false';
            $data[$a]['is_user_group_available_status_name'] = 'error';
            $data[$a]['is_user_group_available_status_color'] = 'bg-red';
            $is_valid = 'false';
            }

            if($collection[$a]['user_type']=='siswa' or $collection[$a]['user_type']=='guru')
            {
                $data[$a]['is_user_type_available'] = 'true';
                $data[$a]['is_user_type_available_status_name'] = '';
                $data[$a]['is_user_type_available_status_color'] = '';
            }
            else
            {
            $data[$a]['is_user_type_available'] = 'false';
            $data[$a]['is_user_type_available_status_name'] = 'error';
            $data[$a]['is_user_type_available_status_color'] = 'bg-red';
            $is_valid = 'false';
            }            

            if($collection[$a]['gendre']=='L' or $collection[$a]['gendre']=='P'){

                $data[$a]['is_gendre_available'] = 'true';
                $data[$a]['is_gendre_available_status_name'] = '';
                $data[$a]['is_gendre_available_status_color'] = '';
            }
            else
            {
            $data[$a]['is_gendre_available'] = 'false';
            $data[$a]['is_gendre_available_status_name'] = 'error';
            $data[$a]['is_gendre_available_status_color'] = 'bg-red';
            $is_valid = 'false';
            } 


        }
        // dd($data);
        $data_json = json_encode($data);
        // $data_array = json_decode($data_json);
        // dd($data_array);
        return view('school.excel.index', compact('data','data_json','is_valid'));
        // return back()->with('success', 'Import User Berhasil');
    }
    public function store_user_excel(Request $request){
        // dd($request['data']);
        $data = json_decode($request->data_json);
        // dd($data);        
            foreach($data as $val){
                // dd($val);
                $check = School::where(['user_id' => auth()->user()->id])->first();
                $user_group = School_group::where(['code' => $val->user_group])            
                ->where(['school_id' => $check->id])
                ->get();
                // dd($user_group[0]['id']);
                $token = (new RandomStringGenerator)->generate(6);
                $user = User::create([
                    'name' => $val->name,
                    'email' => $val->number_id . "@" . str_replace(' ', '', $val->domain),
                    'password' => Hash::make($token),
                    'token' => $token,
                    'nisn' => $val->number_id,
                    'school_group_id' => $user_group[0]['id'],
                    'type' => $val->user_type,
                    'jenis_kelamin' => $val->gendre,
                ]);
    
                $school = School::where('user_id', auth()->user()->id)->first();
                $role = Role::whereName('student')->first();
                $permission = Permission::where(['name' => 'student-access'])->pluck('id');
                $role->syncPermissions($permission);
                $user->assignRole([$role->id]);
                UserJoinSchool::create([
                    'user_id' => $user->id,
                    'school_id' => $school->id,
                    'status' => 'enable'
                ]);                
            }
            return redirect(route('election-school'));
    }
}

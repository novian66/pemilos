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

class ExcellController extends Controller
{
    public function export_user()
    {
        $school = School::where('user_id', auth()->user()->id)->first();
        $data = UserJoinSchool::with('user')->where('school_id', $school->id)->get();
        if (count($data) <= 0) {
            # code...
            return back()->with('error', 'Pengguna Tidak tersedia');
        } else {
            # code...
            $text = "Relap Pengguna " . $school->nama . ".xlsx";
            return (new FastExcel($data))->download($text, function ($user) {
                return [
                    'NISN' => $user->user->nisn,
                    'EMAIL' => $user->user->email,
                    'NAME' => $user->user->name,
                    'L/P' => $user->user->jenis_kelamin,
                    'TYPE' => $user->user->type,
                    'PASSWORD' => $user->user->token
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
        for($a=0;$a<count($collection);$a++){
            $data[$a] = $collection[$a];
            $data[$a]['number'] = $a+2;

            //check duplicate
            $user = User::select('users.*', 'user_join_schools.school_id')
            ->leftjoin('user_join_schools', 'user_join_schools.user_id', '=', 'users.id')
            ->where(['nisn' => $collection[$a]['number_id']])
            ->where(['school_id' => $check->school_id])
            ->get();

            if(!empty($user)){
            $data[$a]['is_not_duplicate'] = 'true';
            $data[$a]['is_not_duplicate_status_name'] = '';
            $data[$a]['is_not_duplicate_status_color'] = '';    
            }
            else{
            $data[$a]['is_not_duplicate'] = 'false';
            $data[$a]['is_not_duplicate_status_name'] = 'error';
            $data[$a]['is_not_duplicate_status_color'] = 'bg-red';
            }
            
            //check user_group
            $user_group = School_group::where(['code' => $collection[$a]['user_group']])
            ->where(['school_id' => $check->school_id])
            ->get();

            if(!empty($user_group))
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
            } 


        }
        // dd($data);
        return view('school.excel.index', compact('data'));
        // return back()->with('success', 'Import User Berhasil');
    }
}

<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Admin\School;
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
            'berkas.required' => 'Excell Belum diupload',
            'berkas.file' => 'Harus berupa file',
            'berkas.mimes' => 'hanya boleh format csv atau xlsx'
        ]);
        
        (new FastExcel)->import($request->berkas, function ($line) {
            $token = (new RandomStringGenerator)->generate(6);
            $user = User::create([
                'name' => $line['NAME'],
                'email' => $line['NISN/NIP'] . "@" . str_replace(' ', '', $line['SCHOOL']) . ".ac.id",
                'password' => Hash::make($token),
                'token' => $token,
                'nisn' => $line['NISN/NIP'],
                'type' => $line['TYPE'],
                'jenis_kelamin' => $line['L/P'],
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
        });

        return back()->with('success', 'Import User Berhasil');
    }
}

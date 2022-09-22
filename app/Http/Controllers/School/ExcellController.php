<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Admin\School;
use App\Models\Admin\UserJoinSchool;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class ExcellController extends Controller
{
    public function export_user()
    {
        $school = School::where('user_id', auth()->user()->id)->first();
        // dd($school);
        // if (empty($data)) {
        //     # code...
        //     return back()->with('error', 'Anda Belum Mendaftarkan Sekolah');
        // }ese
        $data = UserJoinSchool::with('user')->where('school_id', $school->id)->get();
        if (count($data) <= 0) {
            # code...
            return back()->with('error', 'Pengguna Tidak tersedia');
        } else {
            # code...
            $text = "Relap Pengguna ". $school->nama . ".xlsx";
            return (new FastExcel($data))->download($text, function ($user) {
                return [
                    'NISN' => $user->user->nisn,
                    'Nama Lengkap' => $user->user->name,
                    'Jenis Kelamin' => $user->user->jenis_kelamin,
                    'Phone' => $user->user->phone,
                    'Tanggal Lahir' => $user->user->birthday,
                ];
            });
        }
    }
}

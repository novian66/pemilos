<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\ElectionSchool;
use App\Models\Admin\School;
use App\Models\Admin\UserJoinSchool;
use Illuminate\Http\Request;

class DashoardController extends Controller
{
    public function index()
    {
        $school = UserJoinSchool::with('school')->where('user_id', auth()->user()->id)->get();

        return view('user.dashboard', compact('school'));
    }

    public function joinSchool(Request $request)
    {
        $school = School::where('token', $request->token)->first();
        if (empty($school)) {
            # code...
            return redirect()->route('dashboard')->with('error', 'Token Salah!');
        }

        $check = UserJoinSchool::where([
            'user_id' => auth()->user()->id,
            // 'school_id' => $school->id
        ])->first();

        if (!empty($check)) {
            # code...
            return redirect()->route('dashboard')->with('error', 'Anda Tidak Bisa Gabung Lebih dari 1 Sekolah');
        }

        UserJoinSchool::create([
            'user_id' => auth()->user()->id,
            'school_id' => $school->id,
            'status' => "enable",
        ]);

        return redirect()->route('dashboard')->with('success', 'Sukses!');
    }

    public function editProfile(Request $request)
    {
        $user = auth()->user();
        $user->name = $request->nama;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->route('dashboard')->with('success', 'Sukses!');
    }

    public function showSchoolEvent($id)
    {
        $school = School::find($id);
        if (empty($school)) {
            return redirect()->route('dashboard')->with('error', 'Sekolah tidak ditemukan!');
        }
        $election_candidate = ElectionSchool::where('school_id', $school->id)->get();
        return view('user.election', ['data' => $election_candidate]);
    }
}

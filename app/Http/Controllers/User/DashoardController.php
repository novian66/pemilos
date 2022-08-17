<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\CandidateElectionController;
use App\Http\Controllers\Controller;
use App\Models\Admin\ElectionSchool;
use App\Models\Admin\ElectionSchoolCandidate;
use App\Models\Admin\School;
use App\Models\Admin\UserJoinElection;
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
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->route('dashboard')->with('success', 'Sukses!');
    }

    public function showSchoolEvent(Request $request)
    {
        $event = ElectionSchool::where('token', $request->token)->first();
        if (empty($event)) {
            return redirect()->route('dashboard')->with('error', 'Token Salah!');
        }

        $check = UserJoinElection::where([
            'user_id' => auth()->user()->id,
        ])->first();

        if (empty($check)) {
            UserJoinElection::create([
                'user_id' => auth()->user()->id,
                'election_school_id' => $event->id,
                'school_id' => $event->school_id,
            ]);
        }
        return view('user.event', compact('event'));
    }

    public function showEventCandidate(Request $request, $election_school_id)
    {
        $candidate = ElectionSchoolCandidate::where('election_school_id', $election_school_id)->get();
        return view('user.election', compact('candidate'));
    }
}

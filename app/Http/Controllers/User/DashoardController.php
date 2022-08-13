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
        $token = School::where('token', $request->token)->first();
        if (empty($token)) {
            # code...
            return redirect()->route('dashboard')->with('error', 'Token Salah!');
        }

        UserJoinSchool::create([
            'user_id' => auth()->user()->id,
            'school_id' => $token->id,
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

    public function showSchoolEvent(Request $request)
    {
        $event = ElectionSchool::where('token', $request->token)->first();
        if (empty($event)) {
            return redirect()->route('dashboard')->with('error', 'Token Salah!');
        }
        return view('user.election', compact('event'))->with('success', 'Sukses!');
    }
}

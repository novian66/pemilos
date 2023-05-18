<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Admin\CandidateElectionController;
use App\Http\Controllers\Controller;
use App\Models\Admin\ElectionSchool;
use App\Models\Admin\ElectionSchoolCandidate;
use App\Models\Admin\School;
use App\Models\Admin\UserJoinElection;
use App\Models\Admin\UserJoinSchool;
use App\Models\Admin\ElectionVote;

use Illuminate\Http\Request;

class DashoardController extends Controller
{
    public function index()
    {
        $school = UserJoinSchool::with('school')->where('user_id', auth()->user()->id)->get();
        // dd(bcrypt(auth()->user()->password));
        // auth()->user()->password;
        // auth()->user()->birday;
        // dd(str_replace("-","",auth()->user()->birthday));
        $is_cannot_vote = (Hash::check(str_replace("-","",auth()->user()->birthday), auth()->user()->password));
        // {
        //     // The passwords match...
        // }


        return view('user.dashboard', compact('school','is_cannot_vote'));
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
        if(str_replace("-","",$request->birthday)!==$request->password){
            $user = auth()->user();
            $user->name = $request->nama;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->phone = $request->phone;
            // $user->birthday = $request->birthday;
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
            return redirect()->route('dashboard')->with('success', 'Sukses!');
        }
        else{
            return redirect()->route('dashboard')->with('error', 'Password tidak boleh sama dengan tanggal lahir!');
        }

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
        $is_open = 'true';
        $message = '';
        $datenow = strtotime(date('Y-m-d'));
        $election = ElectionSchool::where('id', $election_school_id)->get();
        $start = strtotime($election[0]['start']);
        $end = strtotime($election[0]['end']);
        $candidate = ElectionSchoolCandidate::where('election_school_id', $election_school_id)->get();
        $vote = ElectionVote::where([
            'user_id' => auth()->user()->id,
            'election_school_id' => $election_school_id,
        ])->first();
        // dd($datenow."|".$end);
        if ($vote){
            $is_open = 'false';
            $message = 'Hai, '.auth()->user()->name.'. Anda Sudah Memilih Pada '.$vote['created_at'];
        }
        
        
        elseif($datenow>=$start and $datenow<=$end ){
            $is_open = 'true';
            $message = '';
        }
        elseif($datenow < $start){
            $is_open = 'false';
            $message = 'Waktu Pemilihan Belum Dimulai';
        }
        elseif($datenow > $end){
            $is_open = 'false';
            $message = 'Waktu Pemilihan Telah Berakhir';
        }    
        elseif($vote){

        }    
        return view('user.election', compact('candidate','message', 'is_open'));
    }
}

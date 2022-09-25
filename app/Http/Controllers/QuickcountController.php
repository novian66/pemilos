<?php

namespace App\Http\Controllers;

use App\Models\Admin\ElectionSchool;
use App\Models\Admin\ElectionSchoolCandidate;
use App\Models\Admin\ElectionVote;
use App\Models\Admin\UserJoinElection;
use App\Models\Admin\UserJoinSchool;
use Illuminate\Http\Request;

class QuickcountController extends Controller
{
    public function index()
    {
        return view('quickcount.index');
    }

    public function quickcount(Request $request)
    {
        $election = ElectionSchool::where('token', $request->token)->first();
        if (empty($election)) {
            # code...
            return redirect()->route('quickcount')->with('error', 'Election Not Found');
        }

        $now = date('Y-m-d', strtotime(date('Y-m-d')));
        $deadline = date('Y-m-d', strtotime($election->end));
        if ($now >= $deadline) {
            # code...
            $list_candidate = ElectionSchoolCandidate::with('hitung')->where('election_school_id', $election->id)->orderBy('urutan', 'ASC')->get();
            $paslon = [];
            $suara = [];

            foreach ($list_candidate as $paslonnya) {
                # code...
                $suara[] = count(ElectionVote::where('election_school_candidate_id', $paslonnya->id)->get());
                $paslon[] = $paslonnya->nama;
            }

            $paslon = json_encode($paslon);
            $suara = json_encode($suara);
            $suara_masuk = strval(count(ElectionVote::where('election_school_id', $election->id)->get()));
            $total_pemilih = strval(count(UserJoinSchool::where('school_id', $election->school_id)->get()));
            $pria = strval(count(UserJoinSchool::query()
                ->with('user')
                ->whereHas('user', function ($query) {
                    $query->where('jenis_kelamin', 'L');
                })
                ->where('school_id', $election->school_id)
                ->get()));
            $wanita = strval(count(UserJoinSchool::query()
                ->with('user')
                ->whereHas('user', function ($query) {
                    $query->where('jenis_kelamin', 'P');
                })
                ->where('school_id', $election->school_id)
                ->get()));
            // dd($pria);
            return view('quickcount.view', compact('paslon', 'suara', 'list_candidate', 'election', 'suara_masuk', 'total_pemilih', 'pria', 'wanita'));
        } else {
            return redirect()->route('quickcount')->with('error', 'Pemilihan Belum Selesai');
        }
    }
}

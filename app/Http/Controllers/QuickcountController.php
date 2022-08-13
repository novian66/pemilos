<?php

namespace App\Http\Controllers;

use App\Models\Admin\ElectionSchool;
use App\Models\Admin\ElectionSchoolCandidate;
use App\Models\Admin\ElectionVote;
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

        if ($election->end != date('Y-m-d')) {
            # code...
            return redirect()->route('quickcount')->with('error', 'Pemilihan Belum Selesai');
        }else {
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
            // dd($list_candidate);
            return view('quickcount.view', compact('paslon', 'suara', 'list_candidate', 'election'));
        }
    }
}

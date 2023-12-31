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
    public function __construct()
    {
        $this->electionvote = new ElectionVote();
    } 
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
            // dd($paslon);
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
            $data = $this->electionvote->recap_by_candidate($election->id);
            foreach($data as $key=>$val){
                $recapByCandidate[$val->nama]['total']=0;
            }              
            foreach($data as $key=>$val){
                // $recapByCandidate[$val->nama][$val->groups]=$val->voted;
                $recapByCandidate[$val->nama]['total']+=$val->voted;
            }           
            // $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
            // $rand[rand(0,15)];
            foreach($data as $key=>$val){
                $color = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
                // $recapByCandidate[$val->nama][$val->groups]=$val->voted;
                $recapByCandidate[$val->nama]['id-chart']=str_replace(' ', '', $val->nama);
                if($recapByCandidate[$val->nama]['total']==0){
                    $recapByCandidate[$val->nama]['data']['name'][]=$val->groups." 0% ";
                }
                else{
                    $recapByCandidate[$val->nama]['data']['name'][]=$val->groups." ".round((($val->voted/$recapByCandidate[$val->nama]['total'])*100),2)."% ";
                }
                $recapByCandidate[$val->nama]['data']['voted'][]=$val->voted;
                $recapByCandidate[$val->nama]['data']['color'][]=$color;
            }

            foreach($recapByCandidate as $key=>$val){
                $recapByCandidate[$key]['data_name_json']=json_encode($val['data']['name']);
                $recapByCandidate[$key]['data_voted_json']=json_encode($val['data']['voted']);
                $recapByCandidate[$key]['data_color_json']=json_encode($val['data']['color']);
            }

            // dd($recapByCandidate);
            return view('quickcount.view', compact('recapByCandidate','paslon', 'suara', 'list_candidate', 'election', 'suara_masuk', 'total_pemilih', 'pria', 'wanita'));
        } else {
            return redirect()->route('quickcount')->with('error', 'Pemilihan Belum Selesai');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ElectionSchool;
use App\Models\Admin\ElectionSchoolCandidate;
use App\Models\Admin\ElectionVote;
use DateTime;

class VoteController extends Controller
{
    public function voteCandidate($id, $school_id, $election_id)
    {
        $vote = ElectionVote::where([
            'user_id' => auth()->user()->id,
            'election_school_id' => $election_id,
        ])->first();

        if ($vote) {
            return redirect()->route('dashboard')->with('error', 'Anda Sudah Memilih');
        }

        ElectionVote::create([
            'user_id' => auth()->user()->id,
            'school_id' => $school_id,
            'election_school_id' => $election_id,
            'election_school_candidate_id' => $id,
        ]);

        $eventData = ElectionSchool::where([
            'id' => $election_id,
        ])->first();
        $candidateData = ElectionSchoolCandidate::where([
            'id' => $id,
        ])->first();
        $dt = new DateTime();
        $date = $dt->format('d-m-Y H:i');

        return back()->withInput();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ElectionVote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function voteCandidate($id, $school_id, $election_id)
    {
        $vote = ElectionVote::where([
            'user_id' => auth()->user()->id,
            'school_id' => $school_id,
            'election_school_id' => $election_id,
            'election_school_candidate_id' => $id,
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

        return redirect()->route('dashboard')->with('success', 'Anda Berhasil Memilih');
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\CandidateElectionController;
use App\Http\Controllers\Controller;
use App\Models\Admin\ElectionSchool;
use App\Models\Admin\ElectionSchoolCandidate;
use App\Models\Admin\School;
use App\Models\Admin\UserJoinElection;
use App\Models\Admin\UserJoinSchool;
use App\Models\Admin\ElectionVote;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }
}

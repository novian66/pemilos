<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\ElectionSchool;
use App\Models\Admin\ElectionSchoolCandidate;
use App\Models\Admin\ElectionVote;
use App\Models\Admin\School;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function school(Request $request)
    {
        $data = School::with('user')->paginate(10);
        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);
    }

    public function election(Request $request)
    {
        $data = ElectionSchool::query()
        ->where('school_id', $request->school)
        ->with('school')->paginate(10);
        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);
    }

    public function candidate(Request $request)
    {
        $data = ElectionSchoolCandidate::query()
        ->where('school_id', $request->school)
        ->paginate(10);
        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);
    }

    public function vote(Request $request)
    {
        $data = ElectionVote::query()
        ->where('school_id', $request->school)
        ->paginate(10);
        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);
    }
}

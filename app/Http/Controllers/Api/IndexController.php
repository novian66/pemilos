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
        $data = School::with('user')->get();
        if (count($data) == 0) {
            # code...
            return response()->json([
                'status' => false,
                'message' => 'Not Found Data',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Get All School',
            'data' => $data
        ], 200);
    }

    public function election(Request $request)
    {
        $data = ElectionSchool::query()
            ->where('school_id', $request->school)
            ->with('school')->get();
        if (count($data) == 0) {
            # code...
            return response()->json([
                'status' => false,
                'message' => 'Not Found Data',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Get All Election By School ID',
            'data' => $data
        ], 200);
    }

    public function candidate(Request $request)
    {
        $data = ElectionSchoolCandidate::query()
            ->where('school_id', $request->school)
            ->get();

        if (count($data) == 0) {
            # code...
            return response()->json([
                'status' => false,
                'message' => 'Not Found Data',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Get All Candidate By School ID',
            'data' => $data
        ], 200);
    }

    public function vote(Request $request)
    {
        $data = ElectionVote::query()
            ->where('school_id', $request->school)
            ->get();

        if (count($data) == 0) {
            # code...
            return response()->json([
                'status' => false,
                'message' => 'Not Found Data',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Get All Vote By School ID',
            'data' => $data
        ], 200);
    }
}

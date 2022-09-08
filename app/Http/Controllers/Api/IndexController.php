<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\ElectionSchool;
use App\Models\Admin\ElectionSchoolCandidate;
use App\Models\Admin\ElectionVote;
use App\Models\Admin\School;
use App\Models\Admin\UserJoinSchool;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function user()
    {
        $data = User::all();
        if (count($data) == 0) {
            # code...
            return response()->json([
                'status' => false,
                'message' => 'Not Found Data',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Get All User',
            'data' => $data
        ], 200);
    }

    public function user_school(Request $request)
    {
        $data = UserJoinSchool::with('user', 'school')->where('school_id', $request->school)->get();
        if (count($data) == 0) {
            # code...
            return response()->json([
                'status' => false,
                'message' => 'Not Found Data',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Get All User By School ID',
            'data' => $data
        ], 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token'   => 'required',
        ], [
            'token.required' => 'Token Wajib di isi'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::whereToken($request->token)->first();
        if (empty($user)) {
            # jika token user kosong maka
            return response()->json([
                'status' => false,
                'message' => 'Auth Failed, Token Wronng !!',
            ], 404);
        } else {
            # jika ada token maka
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Login',
                'data' => $user
            ], 200);
        }
    }

    public function send(Request $request)
    {
        $data = $request->all();
        try {
            ElectionVote::insert($data);
            return response()->json([
                'status' => true,
                'message' => 'Blast Vote Berhasil di upload',
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => true,
                'message' => 'Blast Vote Berhasil di upload',
                'data' => $th
            ], 500);
        }
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\School;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $data = School::query()
            ->with('election', 'candidate', 'quickcount')
            ->find($request->school_id);
        if (empty($data)) {
            # code...
            return response()->json([
                'status' => false,
                'data' => 'Not FOund'
            ], 404);
        } else {
            # code...
            return response()->json([
                'status' => true,
                'data' => $data
            ], 200);
        }
    }
}

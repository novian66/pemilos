<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\School;
use App\Models\Api\ApiToken;
use App\Utils\RandomStringGenerator;
use Illuminate\Http\Request;

class ResquestApiController extends Controller
{
    public function index()
    {
        $token = ApiToken::where('user_id', auth()->user()->id)->first();
        return view('school.restapi.index', compact('token'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kebutuhan' => 'required'
        ], [
            'kebutuhan.required' => 'Tolong Isi Terlebih dahulu'
        ]);

        $school = School::where('user_id', auth()->user()->id)->first();
        if (empty($school)) {
            # code...
            return redirect()->route('school.api')->with('error', 'Anda Tidak Memenuhi Syarat');
        }

        ApiToken::create([
            'user_id' => auth()->user()->id,
            'school_id' => $school->id,
            'kebutuhan' => $request->kebutuhan,
            'status' => 'disable'
        ]);

        return redirect()->route('school.api')->with('success', 'Berhasil Request Token APi');
    }

    public function view()
    {
        $api = ApiToken::with('user')->paginate(10);
        return view('admin.restapi.index', compact('api'));
    }

    public function checkapi($id)
    {
        $api = ApiToken::with('user', 'school')->find($id);
        if (empty($api)) {
            # code...
            return redirect()->route('kpu.api')->with('error', 'Request Not Found');
        }

        return view('admin.restapi.view', compact('api'));
    }

    public function aprove(Request $request, $id)
    {
        $api = ApiToken::with('user', 'school')->find($id);
        if (empty($api)) {
            # code...
            return redirect()->route('kpu.api')->with('error', 'Request Not Found');
        }
        $generator = new RandomStringGenerator();
        $api->update([
            'token' => $request->status == 'active' ? $generator->generate(30) : null,
            'status' => $request->status
        ]);

        return redirect()->route('kpu.api')->with('success', 'Status Hass Been Update');
    }
}

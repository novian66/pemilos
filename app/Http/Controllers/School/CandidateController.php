<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Admin\ElectionSchool;
use App\Models\Admin\ElectionSchoolCandidate;
use App\Models\Admin\School;
use App\Utils\RandomStringGenerator;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function create($id)
    {
        $school = School::where(['user_id' => auth()->user()->id])->first();
        if (empty($school)) {
            # code...
            return redirect()->route('school-management')->with('error', 'School Not Found');
        }

        $election = ElectionSchool::find($id);
        if (empty($election)) {
            # code...
            return redirect()->route('lihat-election', $election->id)->with('error', 'School Not Found');
        }
        return view('school.candidate.create', compact('school', 'election'));
    }

    public function store(Request $request, $id)
    {
        $school = School::where(['user_id' => auth()->user()->id])->first();
        if (empty($school)) {
            # code...
            return redirect()->route('school-management')->with('error', 'School Not Found');
        }

        $election = ElectionSchool::find($id);
        if (empty($election)) {
            # code...
            return redirect()->route('lihat-election', $election->id)->with('error', 'School Not Found');
        }

        $request->validate([
            'urutan' => 'required|numeric',
            'nama' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:png,jpg'
        ]);

        $ImageName = time() . '.' . $request->image->extension();
        $generator = new RandomStringGenerator();

        ElectionSchoolCandidate::create([
            'school_id' => $school->id,
            'election_school_id' => $election->id,
            'nama' => $request->nama,
            'urutan' => $request->urutan,
            'description' => $request->deskripsi,
            'poster' => $ImageName,
            'token' => $generator->generate(6),
        ]);

        $request->image->move(public_path('dist/img/candidate/'), $ImageName);
        return redirect()->route('lihat-election', $election->id)->with('success', 'Candidate hass been created');
    }

    public function destroy($candidate_id, $id)
    {
        $candidate = ElectionSchoolCandidate::find($candidate_id);
        $candidate->delete();
        // $election = ElectionSchool::find($id);
        return redirect()->route('lihat-election', 4)->with('success', 'Candidate Hass Been Deleted');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ElectionSchool;
use App\Models\Admin\ElectionSchoolCandidate;
use App\Models\Admin\School;
use App\Utils\RandomStringGenerator;
use Illuminate\Http\Request;

class CandidateElectionController extends Controller
{
    public function create($id, $election_id)
    {
        $school = School::find($id);
        if (empty($school)) {
            # code...
            return redirect()->route('school.index')->with('error', 'School Not Found');
        }

        $election = ElectionSchool::find($election_id);
        if (empty($election)) {
            # code...
            return redirect()->route('school.index')->with('error', 'School Not Found');
        }
        return view('admin.candidate.create', compact('school', 'election'));
    }

    public function store(Request $request, $id, $election_id)
    {
        $school = School::find($id);
        if (empty($school)) {
            # code...
            return redirect()->route('school.index')->with('error', 'School Not Found');
        }

        $election = ElectionSchool::find($election_id);
        if (empty($election)) {
            # code...
            return redirect()->route('school.index')->with('error', 'School Not Found');
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
        return redirect()->route('election.view', ['id' => $school->id, 'election_id' => $election->id])->with('success', 'Candidate hass been created');
    }
}

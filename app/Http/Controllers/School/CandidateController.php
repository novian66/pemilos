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

    public function destroy($id)
    {
        $candidate = ElectionSchoolCandidate::find($id);
        $candidate->delete();
        return redirect()->back()->with('success', 'Candidate Hass Been Deleted');
    }

    public function view($id,$id_candidate)
    {
        $data = ElectionSchoolCandidate::findOrFail($id_candidate);
        $id_election = ElectionSchool::find($data->election_school_id);
        return view('school.candidate.view', compact('data', 'id_election'));
    }

    public function update(Request $request, $id, $id_candidate)
    {
        $data = ElectionSchoolCandidate::find($id_candidate);
        $election = ElectionSchool::find($data->election_school_id);
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'image' => 'image|mimes:png,jpg'
        ], [
            'nama.required' => 'Nama Paslon Masih Kosong',
            'deskripsi.required' => 'Deskripsi paslon kosong',
            'image.image' => 'FOrmat gambar salah',
            'image.mimes' => 'Gambar hanya JPG dan PNG'
        ]);

        if ($request->image) {
            # code...
            unlink(public_path('dist/img/candidate/'. $data->poster));
            $ImageName = time() . '.' . $request->image->extension();
            $data->update([
                'nama' => $request->nama,
                'description' => $request->deskripsi,
                'poster' => $ImageName,
            ]);
            $request->image->move(public_path('dist/img/candidate/'), $ImageName);
        } else {
            # code...
            $data->update([
                'nama' => $request->nama,
                'description' => $request->deskripsi,
            ]);
        }
        return redirect()->route('lihat-election', $election->id)->with('success', 'Candidate hass been update');
    }
}

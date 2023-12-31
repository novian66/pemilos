<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ElectionSchool;
use App\Models\Admin\ElectionSchoolCandidate;
use App\Models\Admin\School;
use App\Utils\RandomStringGenerator;
use Illuminate\Http\Request;

class ElectionSchoolController extends Controller
{
    public function create($id)
    {
        $check = School::find($id);
        if (empty($check)) {
            # code...
            return redirect()->route('school.index')->with('error', 'School Not Found');
        }
        return view('admin.election.create', compact('check'));
    }

    public function store(Request $request, $id)
    {
        // dd($request->all());
        $check = School::find($id);
        if (empty($check)) {
            # code...
            return redirect()->route('school.index')->with('error', 'School Not Found');
        }

        $request->validate([
            'title' => 'required',
            'deskripsi' => 'required',
            'start' => 'required',
            'end' => 'required',
            'image' => 'required|image|mimes:png,jpg'
        ]);

        $status = 'disable';
        if ($request->status == "on") {
            # code...
            $status = 'enable';
        }
        $ImageName = time() . '.' . $request->image->extension();
        $generator = new RandomStringGenerator();

        ElectionSchool::create([
            'school_id' => $check->id,
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'start' => $request->start,
            'end' => $request->end,
            'image' => $ImageName,
            'token' => $generator->generate(6),
            'status' => $status
        ]);

        $request->image->move(public_path('dist/img/election/'), $ImageName);
        return redirect()->route('school.view', $check->id)->with('success', 'Election hass been created');
    }

    public function view($id, $election_id)
    {
        $school = School::find($id);
        if (empty($school)) {
            # code...
            return redirect()->route('school.index')->with('error', 'School Not Found');
        }

        $data = ElectionSchool::find($election_id);
        if (empty($data)) {
            # code...
            return redirect()->route('school.index')->with('error', 'School Not Found');
        }

        $candidate = ElectionSchoolCandidate::where([
            'school_id' => $school->id,
            'election_school_id' => $data->id
        ])->orderBy('urutan', 'ASC')->get();

        return view('admin.election.view', compact('data', 'school', 'candidate'));
    }

    public function update($id, $election_id, Request $request)
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
            'title' => 'required',
            'deskripsi' => 'required',
            'start' => 'required',
            'end' => 'required',
            'image' => 'image|mimes:png,jpg'
        ]);

        $status = 'disable';
        if ($request->status == "on") {
            # code...
            $status = 'enable';
        }

        if ($request->image) {
            # code...
            unlink(public_path('dist/img/election' . $election->image));

            $ImageName = time() . '.' . $request->image->extension();

            $election->update([
                'school_id' => $school->id,
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'start' => $request->start,
                'end' => $request->end,
                'image' => $ImageName,
                'status' => $status
            ]);

            $request->image->move(public_path('dist/img/election/'), $ImageName);
        }

        $election->update([
            'school_id' => $school->id,
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'start' => $request->start,
            'end' => $request->end,
            'status' => $status
        ]);

        return redirect()->route('election.view', ['id' => $school->id, 'election_id' => $election->id])->with('success', 'Election Hass Been Update');
    }

    public function destroy($id, $election_id)
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

        unlink(public_path('dist/img/election/'. $election->image));
        $election->delete();
        return redirect()->route('school.view', $school->id)->with('success', 'Election Hass Been Deleted');
    }
}

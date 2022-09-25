<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Admin\ElectionSchool;
use App\Models\Admin\ElectionSchoolCandidate;
use App\Models\Admin\School;
use App\Models\Admin\UserJoinSchool;
use App\Utils\RandomStringGenerator;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    public function index(Request $request)
    {
        $data = School::where(['user_id' => auth()->user()->id])->first();
        $election = ElectionSchool::with('vote')->where('school_id', $data->id)->get();
        $name = $request->name;
        $jk = $request->jk;
        $type = $request->type;
        $user = UserJoinSchool::query()
            ->with('user')->where('school_id', $data->id)
            ->when($name, function ($query) use ($name) {
                $query->whereHas('user', function ($query) use ($name) {
                    $query->where('name',  'like', '%' . $name . '%');
               });
            })
            ->when($jk, function ($query) use ($jk) {
                $query->whereHas('user', function ($query) use ($jk) {
                    $query->where('jenis_kelamin', $jk);
               });
            })
            ->when($type, function ($query) use ($type) {
                $query->whereHas('user', function ($query) use ($type) {
                    $query->where('type', $type);
               });
            })
            ->paginate(8);
            
        $jumlah = UserJoinSchool::query()
        ->with('user')->where('school_id', $data->id)
        ->count();
        return view('school.election.index', compact('data', 'election', 'user', 'jumlah'));
    }

    public function create()
    {
        $check = School::where(['user_id' => auth()->user()->id])->first();
        if (empty($check)) {
            # code...
            return redirect()->route('election-school')->with('error', 'School Not Found');
        }
        return view('school.election.create', compact('check'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $check = School::where(['user_id' => auth()->user()->id])->first();
        if (empty($check)) {
            # code...
            return redirect()->route('election-school')->with('error', 'School Not Found');
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
        return redirect()->route('election-school')->with('success', 'Election hass been created');
    }

    public function view($id)
    {
        $school = School::where(['user_id' => auth()->user()->id])->first();
        if (empty($school)) {
            # code...
            return redirect()->route('election-school')->with('error', 'School Not Found');
        }

        $data = ElectionSchool::find($id);
        if (empty($data)) {
            # code...
            return redirect()->route('election-school')->with('error', 'Election Not Found');
        }

        $candidate = ElectionSchoolCandidate::where([
            'school_id' => $school->id,
            'election_school_id' => $data->id
        ])->orderBy('urutan', 'ASC')->get();

        return view('school.election.view', compact('data', 'school', 'candidate'));
    }

    public function update($id, Request $request)
    {
        // dd($request->all());
        $school = School::where(['user_id' => auth()->user()->id])->first();
        // // dd($id);
        if (empty($school)) {
            # code...
            return redirect()->route('election-school')->with('error', 'School Not Found');
        }

        $election = ElectionSchool::find($id);
        if (empty($election)) {
            # code...
            return redirect()->route('election-school')->with('error', 'Election Not Found');
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
        }else {
            ElectionSchool::find($id)->update([
                'school_id' => $school->id,
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'start' => $request->start,
                'end' => $request->end,
                'status' => $status
            ]);
        }
        return redirect()->route('lihat-election', $school->id)->with('success', 'Election Hass Been Update');
    }

    public function destroy($id)
    {
        $school = School::where(['user_id' => auth()->user()->id])->first();
        if (empty($school)) {
            # code...
            return redirect()->route('election-school')->with('error', 'School Not Found');
        }

        $election = ElectionSchool::find($id);
        if (empty($election)) {
            # code...
            return redirect()->route('election-school')->with('error', 'Election Not Found');
        }

        unlink(public_path('dist/img/election/'. $election->image));
        $election->delete();
        return redirect()->route('lihat-election', $school->id)->with('success', 'Election Hass Been Deleted');
    }
}

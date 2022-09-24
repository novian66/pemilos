<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ElectionSchool;
use App\Models\Admin\School;
use App\Models\Admin\UserJoinSchool;
use App\Utils\RandomStringGenerator;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class SchoolController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:school-access', ['only' => [
        //     'index', 'create', 'store', 'view', 'edit', 'update', 'destroy'
        // ]]);
    }

    public function index(Request $request)
    {
        $data = School::query()
            ->when($request->cari, function ($q, $r) {
                $q->where('nama', 'LIKE', "%{$r}%")
                    ->orWhere('adress', 'LIKE', "%{$r}%");
            })
            ->paginate(8);
        return view('admin.school.index', compact('data'));
    }

    public function import(Request $request)
    {

        $school = (new FastExcel)->import($request->sampel, function ($line) {
            return School::create([
                'user_id' => auth()->user()->id,
                'nama' => $line['name'],
                'adress' => $line['description'],
                'token' => (new RandomStringGenerator)->generate(6),
                'email' => '-',
                'phone' => '-',
                'logo' => '-'
            ]);
        });

        return redirect()->route('school.index')->with('success', 'School Hass been Imported');
    }

    public function create()
    {
        return view('admin.school.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:schools',
            'address' => 'required',
            'email' => 'required|email|unique:schools',
            'phone' => 'required|numeric|min:10',
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        $status = 'disable';
        if ($request->status == "on") {
            # code...
            $status = 'active';
        }
        $ImageName = time() . '.' . $request->image->extension();
        $generator = new RandomStringGenerator();

        School::create([
            'user_id' => auth()->user()->id,
            'nama' => $request->nama,
            'adress' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $status,
            'token' => $generator->generate(6),
            'logo' => $ImageName,
        ]);

        $request->image->move(public_path('dist/img/logo/'), $ImageName);
        return redirect()->route('school.index')->with('success', 'School Hass Been Create');
    }

    public function view($id, Request $request)
    {
        $data = School::findorFail($id);
        $election = ElectionSchool::where('school_id', $data->id)->get();
        $user = UserJoinSchool::query()
            ->with('user')->where('school_id', $data->id)
            ->paginate(8);
        $totalUser = UserJoinSchool::where('school_id', $data->id)->count();
        return view('admin.school.view', compact('data', 'election', 'user', 'totalUser'));
    }

    public function edit($id)
    {
        $data = School::findorFail($id);
        return view('admin.school.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $data = School::find($id);
        if (empty($data)) {
            # code...
            return redirect()->route('school.index')->with('error', 'Data School Not Found');
        }

        $request->validate([
            'nama' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:10',
            'image' => 'image|mimes:jpg,png,jpeg'
        ]);

        $status = 'disable';
        if ($request->status == "on") {
            # code...
            $status = 'active';
        }

        if ($request->image) {
            // unlick image
            unlink(public_path('dist/img/logo/' . $data->logo));

            $ImageName = time() . '.' . $request->image->extension();

            $data->update([
                'user_id' => auth()->user()->id,
                'nama' => $request->nama,
                'adress' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'status' => $status,
                'logo' => $ImageName,
            ]);

            $request->image->move(public_path('dist/img/logo/'), $ImageName);
        }


        $data->update([
            'user_id' => auth()->user()->id,
            'nama' => $request->nama,
            'adress' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $status,
        ]);

        return redirect()->route('school.view', $data->id)->with('success', 'School Hass Been Update');
    }

    public function destroy($id)
    {
        $data = School::find($id);
        if (empty($data)) {
            # code...
            return redirect()->route('school.index')->with('error', 'Data School Not Found');
        }

        unlink(public_path('dist/img/logo/' . $data->logo));
        $data->delete();
        return redirect()->route('school.index')->with('success', 'Data School Hass Been Deleted');
    }
}

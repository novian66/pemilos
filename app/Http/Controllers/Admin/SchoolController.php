<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ElectionSchool;
use App\Models\Admin\School;
use App\Utils\RandomStringGenerator;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $data = School::paginate();
        return view('admin.school.index', compact('data'));
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
        $ImageName = time().'.'.$request->image->extension();  
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

    public function view($id)
    {
        $data = School::findorFail($id);
        $election = ElectionSchool::where('school_id', $data->id)->get();
        return view('admin.school.view', compact('data', 'election'));
    }

    public function edit($id)
    {
        $data = School::findorFail($id);
        return view('admin.school.edit', compact('data'));
    }
}

<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Admin\School;
use App\Utils\RandomStringGenerator;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $school = School::where('user_id', auth()->user()->id)->first();
        if (empty($school)) {
            # code...
            session()->flash('error', 'Silahkan Daftarkan Sekolah anda');
        }
        return view('school.dashboard', compact('school'));
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
        return redirect()->route('school-management')->with('success', 'School Hass Been Create');
    }

    public function update(Request $request)
    {
        $data = School::where('user_id', auth()->user()->id)->first();

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

        return redirect()->route('school-management', $data->id)->with('success', 'School Hass Been Update');
    }

    public function destroy()
    {
        $data = School::where('user_id', auth()->user()->id)->first();
        unlink(public_path('dist/img/logo/' . $data->logo));
        $data->delete();
        return redirect()->route('school-management');
    }
}

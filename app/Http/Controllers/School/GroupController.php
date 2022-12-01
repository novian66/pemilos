<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\School;
use App\Models\Admin\School_group;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $check = School::where(['user_id' => auth()->user()->id])->first();
        if (empty($check)) {
            # code...
            return redirect()->route('election-school')->with('error', 'School Not Found');
        }
        // $sch
        $data = School_group::where(['school_id'=>$check->id])->get(); 
        for($a=0;$a<count($data);$a++){
            $data[$a]->status_name = ($data[$a]->status==1)?"Aktif":"Tidak Aktif";
            $data[$a]->status_color = ($data[$a]->status==1)?"bg-blue":"bg-red";
        }
        $data->push();
        // dd($data);  
        return view('school.group.index', compact('check','data'));
    }

    public function create()
    {
        $check = School::where(['user_id' => auth()->user()->id])->first();
        if (empty($check)) {
            # code...
            return redirect()->route('election-school')->with('error', 'School Not Found');
        }
        // $sch
        $data = School_group::where(['school_id'=>$check->id])->get(); 
        // dd($data);  
        return view('school.group.input', compact('check','data'));
    }    

    public function edit(School_group $school_group){
        // dd($data);
        return view('school.group.edit', compact('school_group'));

    }

    public function store(Request $request){
        $check = School::where(['user_id' => auth()->user()->id])->first();
        $request->request->add(['school_id' => $check->id]);
        // dd($request);
        $validateData = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'school_id' => 'required',
            'status' => 'required'
        ]);
        School_group::create($validateData);
        $request->session()->flash('message','Penambahan data berhasil');
        return redirect(route('group-school'));
        // return view('school.group.index', compact('check','data'));
    }    

    public function update(Request $request, School_group $school_group){
        $check = School::where(['user_id' => auth()->user()->id])->first();
        $request->request->add(['school_id' => $check->id]);
        // dd($request);
        $validateData = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'school_id' => 'required',
            'status' => 'required'
        ]);
        School_group::where('id',$school_group->id)->update($validateData);
        $request->session()->flash('message','Perubahan data berhasil');
        return redirect(route('group-school'));
    }
}

<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\School;
use App\Models\Admin\ElectionSchool;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
    }
    public function index(Request $request, $election_school_id)
    {
        $election = ElectionSchool::where(['id' => $election_school_id])->first();
        $school = School::where(['user_id' => auth()->user()->id])->first();
        $find['school_id']=$school->id;
        $users=$this->user->get_user_participant($find,$election_school_id);
        foreach($users as $key=>$val){
            $data['group'][$val->school_group_name]['voting']=0;
            $data['group'][$val->school_group_name]['not_voting']=0;
            $data['group'][$val->school_group_name]['total']=0;
            $data['all']['voting']=0;
            $data['all']['not_voting']=0;
            $data['all']['total']=0;
        };
        foreach($users as $key=>$val){
                $data['all']['total']+=1;
            if($val->is_voting==1){
                $data['all']['voting']+=1;
            }
            elseif($val->is_voting==0){
                $data['all']['not_voting']+=1;
            }            
            foreach($data['group'] as $key2=>$val2){
                if($val->school_group_name==$key2){
                    $data['group'][$val->school_group_name]['total']+=1;
                }
                if($val->school_group_name==$key2 and $val->is_voting==1){
                    $data['group'][$val->school_group_name]['voting']+=1;
                }
                elseif($val->school_group_name==$key2 and $val->is_voting==0){
                    $data['group'][$val->school_group_name]['not_voting']+=1;
                }
            }
        };
        // dd($election);
        // $check = School::where(['user_id' => auth()->user()->id])->first();
        // if (empty($check)) {
        //     # code...
        //     return redirect()->route('election-school')->with('error', 'School Not Found');
        // }
        // // $sch
        // $data = School_group::where(['school_id'=>$check->id])->get(); 
        // for($a=0;$a<count($data);$a++){
        //     $data[$a]->status_name = ($data[$a]->status==1)?"Aktif":"Tidak Aktif";
        //     $data[$a]->status_color = ($data[$a]->status==1)?"bg-blue":"bg-red";
        // }
        // $data->push();
        // dd($data);  
        return view('school.participant.index', compact('data','election'));
    }

    // public function create()
    // {
    //     $check = School::where(['user_id' => auth()->user()->id])->first();
    //     if (empty($check)) {
    //         # code...
    //         return redirect()->route('election-school')->with('error', 'School Not Found');
    //     }
    //     // $sch
    //     $data = School_group::where(['school_id'=>$check->id])->get(); 
    //     // dd($data);  
    //     return view('school.group.input', compact('check','data'));
    // }    

    // public function edit(School_group $school_group){
    //     // dd($data);
    //     return view('school.group.edit', compact('school_group'));

    // }

    // public function store(Request $request){
    //     $check = School::where(['user_id' => auth()->user()->id])->first();
    //     $request->request->add(['school_id' => $check->id]);
    //     // dd($request);
    //     $validateData = $request->validate([
    //         'code' => 'required',
    //         'name' => 'required',
    //         'school_id' => 'required',
    //         'status' => 'required'
    //     ]);
    //     School_group::create($validateData);
    //     $request->session()->flash('message','Penambahan data berhasil');
    //     return redirect(route('group-school'));
    //     // return view('school.group.index', compact('check','data'));
    // }    

    // public function update(Request $request, School_group $school_group){
    //     $check = School::where(['user_id' => auth()->user()->id])->first();
    //     $request->request->add(['school_id' => $check->id]);
    //     // dd($request);
    //     $validateData = $request->validate([
    //         'code' => 'required',
    //         'name' => 'required',
    //         'school_id' => 'required',
    //         'status' => 'required'
    //     ]);
    //     School_group::where('id',$school_group->id)->update($validateData);
    //     $request->session()->flash('message','Perubahan data berhasil');
    //     return redirect(route('group-school'));
    // }
}

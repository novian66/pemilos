<?php

namespace App\Http\Controllers;

use App\Models\Admin\School;
use App\Models\Admin\UserJoinSchool;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = UserJoinSchool::where('user_id', auth()->user()->id)->first();
        if ($user) {
            $school = School::find($user->school_id);
            return view('home', compact('school'));
        } else {
            return view('home');
        }
    }
}

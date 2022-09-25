<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ElectionSchool;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $data = ElectionSchool::with('school')->get();
        // dd($data);
        return view('admin.history.index', compact('data'));
    }
}

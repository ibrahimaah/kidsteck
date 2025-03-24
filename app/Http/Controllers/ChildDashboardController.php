<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class ChildDashboardController extends Controller
{
    public function index()
    {
        $stories = Story::with('parts')->get();
        return view('site.child.dashboard',compact('stories'));
    }
}

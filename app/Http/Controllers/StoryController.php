<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::where('is_active',true)->get();
        return view('site.stories.index',compact('stories'));
    }
}

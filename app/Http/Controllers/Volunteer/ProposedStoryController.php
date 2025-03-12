<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\ProposedStory;
use Illuminate\Http\Request;

class ProposedStoryController extends Controller
{
    public function index()
    {
        $proposed_stories = ProposedStory::where('status','accepted')->get();
        return view('site.volunteer.proposed-stories.index',compact('proposed_stories'));
    }

    public function show($id)
    {
        $proposed_story = ProposedStory::findOrFail($id);
        return view('site.volunteer.proposed-stories.show',compact('proposed_story'));
    }
}

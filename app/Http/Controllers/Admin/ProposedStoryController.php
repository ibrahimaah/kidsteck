<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProposedStory;
use Illuminate\Http\Request;

class ProposedStoryController extends Controller
{
    public function index()
    {
        $proposed_stories = ProposedStory::all();
        return view('admin.proposed-stories.index',compact('proposed_stories'));
    }

    public function show($id)
    {
        $proposed_story = ProposedStory::findOrFail($id);
        return view('admin.proposed-stories.show',compact('proposed_story'));
    }

    public function accept($id)
    {
        $proposed_story = ProposedStory::findOrFail($id);
        $proposed_story->status = 'accepted';
        $proposed_story->save();

        return redirect()->route('admin.proposed-stories')->with('success','تم قبول المقترح بنجاح');
    }

    public function reject($id)
    {
        $proposed_story = ProposedStory::findOrFail($id);
        $proposed_story->status = 'rejected';
        $proposed_story->save();
        
        return redirect()->route('admin.proposed-stories')->with('success','تم رفض المقترح بنجاح');
    }

    public function delete($id)
    {
        $proposed_story = ProposedStory::findOrFail($id); 
        $proposed_story->delete();
        
        return redirect()->route('admin.proposed-stories')->with('success','تم حذف المقترح بنجاح');
    }
}

<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProposedStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProposedStoryController extends Controller
{
    public function index()
    {
        $proposed_stories = ProposedStory::all();
        return view('site.parent.proposed-stories.index',compact('proposed_stories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('site.parent.proposed-stories.create',['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255', 
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string', 
            'target_age' => 'required|in:[4-6],[6-8],[8-10]',
        ]);

       ProposedStory::create([
            'title' => $validated['title'], 
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'target_age' => $validated['target_age'],
        ]);
 

        return redirect()->route('parent.proposed-stories')->with('success', 'تمت إضافة المقترح بنجاح!');
    }

    public function edit($id)
    { 
        $proposed_story = ProposedStory::findOrFail($id);
        $categories = Category::all();
        return view('site.parent.proposed-stories.edit', compact('proposed_story', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $Proposed_story = ProposedStory::findOrFail($id);
        // dd($request->all());
        $validated = $request->validate([
            'title' => 'required|string|max:255', 
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string', 
            'target_age' => 'required|in:[4-6],[6-8],[8-10]',
        ]);

        $validated['parent_id'] = Auth::id();
        $Proposed_story->update($validated);

        return redirect()->route('parent.proposed-stories')->with('success', 'تم تحديث المقترح بنجاح!');
    }


    public function delete($id)
    {
        $story = ProposedStory::findOrFail($id); 

        // Delete the story
        $story->delete();

        return redirect()->route('parent.proposed-stories')->with('success', 'تم حذف المقترح بنجاح!');
    }
}

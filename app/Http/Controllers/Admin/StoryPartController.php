<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\StoryPart;
use Illuminate\Http\Request;

class StoryPartController extends Controller
{
    public function index($story_id)
    {
        $story = Story::find($story_id);
        $storyParts = $story->parts;
        // dd($storyParts);
        return view('admin.stories.story_parts.index',['story' => $story,'storyParts'=>$storyParts]);
    }

    public function create($story_id)
    {
        $latestOrder = StoryPart::where('story_id', $story_id)->max('order') ?? 0;
        $current_order = $latestOrder + 1;
        
        return view('admin.stories.story_parts.create',['story_id' => $story_id,'current_order' => $current_order]);
    }

 
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'story_id' => 'required|exists:stories,id',
            // 'order' => 'required|unique:story_parts,order',
            'order' => 'required',
            'title' => 'required|string|max:255',
            'video' => 'required|mimes:mp4,mov,avi,wmv|max:51200', // Limit to 100MB
            'description' => 'nullable|string',
        ]);

        // Get the latest order number
        // $latestOrder = StoryPart::where('story_id', $request->story_id)->max('order') ?? 0;

        // Create new story part without the video initially
        $storyPart = StoryPart::create([
            'story_id' => $request->story_id,
            'title' => $request->title,
            'description' => $request->description,
            // 'order' => $latestOrder + 1,
            'order' => $request->order,
        ]);

        // If video is uploaded, use Spatie Media Library to store it
        if ($request->hasFile('video')) {
            $storyPart->addMedia($request->file('video'))
                ->toMediaCollection('videos'); // Specify your media collection name, e.g., 'videos'
        }

        // Redirect with success message
        return redirect()->route('admin.story_parts', ['story_id' => $request->story_id])
            ->with('success', 'تم إضافة الجزء الجديد بنجاح!');
    }

    public function edit($id)
    {
        // Retrieve the story part by its ID
        $storyPart = StoryPart::findOrFail($id);

        return view('admin.stories.story_parts.edit', ['storyPart' => $storyPart]);
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'story_id' => 'required|exists:stories,id',
            // 'order' => 'required|unique:story_parts,order,' . $id,
            'order' => 'required',
            'title' => 'required|string|max:255',
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:51200', // Limit to 100MB
            'description' => 'nullable|string',
        ]);

        // Retrieve the story part to be updated
        $storyPart = StoryPart::findOrFail($id);

        // Update the story part fields
        $storyPart->update([
            'story_id' => $request->story_id,
            'title' => $request->title,
            'description' => $request->description,
            'order' => $request->order,
        ]);

        // If video is uploaded, use Spatie Media Library to update the video
        if ($request->hasFile('video')) {
            // Remove the previous video
            $storyPart->clearMediaCollection('videos'); // Specify the correct media collection name

            // Add the new video
            $storyPart->addMedia($request->file('video'))
                ->toMediaCollection('videos');
        }

        // Redirect with success message
        return redirect()->route('admin.story_parts', ['story_id' => $request->story_id])
            ->with('success', 'تم تحديث الجزء بنجاح!');
    }

    public function delete($id)
    {
        // Retrieve the story part to be deleted
        $storyPart = StoryPart::findOrFail($id);

        // Remove the associated media files (videos)
        $storyPart->clearMediaCollection('videos'); // Specify your media collection name

        // Delete the story part from the database
        $storyPart->delete();

        // Redirect with success message
        return redirect()->route('admin.story_parts', ['story_id' => $storyPart->story_id])
            ->with('success', 'تم حذف الجزء بنجاح!');
    }

}

     

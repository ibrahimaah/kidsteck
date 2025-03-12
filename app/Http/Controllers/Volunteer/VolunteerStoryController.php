<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VolunteerStoryController extends Controller
{
    public function index()
    {
        $stories = Story::where('volunteer_id',Auth::id())->get();
        return view('site.volunteer.stories.index', ['stories' => $stories]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('site.volunteer.stories.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255', 
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'story_cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            'target_age' => 'required|in:[4-6],[6-8],[8-10]',
        ]);

        $story = Story::create([
            'title' => $validated['title'],
            'is_active' => false,
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'target_age' => $validated['target_age'],
            'added_by' => 'volunteer',
            'volunteer_id' => Auth::id(),
            'status' => 'pending'
        ]);

        // Handle cover image upload using Spatie Media Library
        if ($request->hasFile('story_cover_image')) {
            $story->addMedia($request->file('story_cover_image'))->toMediaCollection('story_cover_images');
        }

        return redirect()->route('volunteer.stories.index')->with('success', 'تمت إضافة القصة  بنجاح وسيتم مراجعتها من قبل الأدمن!');
    }

    public function edit($id)
    {
        $story = Story::findOrFail($id);
        $categories = Category::all();  // Assuming you have a `Category` model
        return view('site.volunteer.stories.edit', compact('story', 'categories'));
    }

    public function show($id)
    {
        $story = Story::findOrFail($id);
        $categories = Category::all();  // Assuming you have a `Category` model
        return view('site.volunteer.stories.show', compact('story', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255', 
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'story_cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            'target_age' => 'required|in:[4-6],[6-8],[8-10]',
        ]);

        $story = Story::findOrFail($id);

        $story->update([
            'title' => $validated['title'], 
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'target_age' => $validated['target_age'],
        ]);

        // Handle cover image upload using Spatie Media Library
        if ($request->hasFile('story_cover_image')) {
            // Remove the old cover image first
            if ($story->getFirstMedia('story_cover_images')) {
                $story->clearMediaCollection('story_cover_images');
            }

            $story->addMedia($request->file('story_cover_image'))->toMediaCollection('story_cover_images');
        }

        return redirect()->route('volunteer.stories.index')->with('success', 'تم تحديث القصة بنجاح!');
    }

    public function delete($id)
    {
        $story = Story::findOrFail($id);

        // Delete associated cover image if it exists
        if ($story->getFirstMedia('story_cover_images')) {
            $story->getFirstMedia('story_cover_images')->delete();
        }

        // Delete the story
        $story->delete();

        return redirect()->route('volunteer.stories.index')->with('success', 'تم حذف القصة بنجاح!');
    }
}

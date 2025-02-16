<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::all();
        return view('admin.stories.index',['stories' => $stories]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.stories.create',['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'is_active' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'story_cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            'target_age' => 'required|in:[4-6],[6-8],[8-10]',
        ]);

        $story = Story::create([
            'title' => $validated['title'],
            'is_active' => $validated['is_active'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'target_age' => $validated['target_age'],
        ]);

        // Handle cover image upload using Spatie Media Library
        if ($request->hasFile('story_cover_image')) {
            $story->addMedia($request->file('story_cover_image'))->toMediaCollection('story_cover_images');
        }

        return redirect()->route('admin.stories')->with('success', 'تمت إضافة القصة بنجاح!');
    }

    public function edit($id)
    {
        $story = Story::findOrFail($id);
        $categories = Category::all();  // Assuming you have a `Category` model
        return view('admin.stories.edit', compact('story', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'is_active' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'story_cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            'target_age' => 'required|in:[4-6],[6-8],[8-10]',
        ]);

        $story = Story::findOrFail($id);

        $story->update([
            'title' => $validated['title'],
            'is_active' => $validated['is_active'],
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

        return redirect()->route('admin.stories')->with('success', 'تم تحديث القصة بنجاح!');
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

        return redirect()->route('admin.stories')->with('success', 'تم حذف القصة بنجاح!');
    }



}

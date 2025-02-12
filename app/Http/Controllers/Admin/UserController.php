<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
                                   
        return view('admin.users.index', compact('users'));
    }

     
    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required|integer|exists:roles,id',
        ]);

        // Create User
        User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role_id' => $validatedData['role_id'],
        ]);

        return redirect()->back()->with('success', 'تم إضافة المستخدم بنجاح');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.edit', ['user' => $user , 'roles' => $roles]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'role_id' => 'required|exists:roles,id'
        ]);
        
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'تم حذف المستخدم بنجاح');
    }

    public function create_user_child()
    {
        return view('admin.users.create_child');
    }

    public function store_user_child(Request $request)
    {
        $validatedData = $request->validate([
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'age' => 'required|integer|min:0|max:100',
            'preferred_language' => 'required|in:java,javascript,python,php',
            'interests' => 'required|array',
            'interests.*' => 'in:sports,music,reading',
        ]);
         
        // Create User 

        // Prepare data before inserting
        $name = $validatedData['name'];
        $username = $validatedData['username'];
        $email = $validatedData['email'];
        $password = bcrypt($validatedData['password']); // Hash the password
        $age = $validatedData['age'];
        $preferredLanguage = $validatedData['preferred_language'];
        $interests = json_encode($validatedData['interests']); // Convert array to JSON

        // Create User manually
        $user = new User();
        $user->name = $name;
        $user->username = $username;
        $user->email = $email;
        $user->password = $password;
        $user->age = $age;
        $user->preferred_language = $preferredLanguage;
        $user->interests = $interests;
        $user->role_id = 4;
        $user->save();

        // Add the uploaded file to the media library
        if ($request->hasFile('profile_image')) 
        {
            $user->addMedia($request->file('profile_image'))->toMediaCollection('profile_images');
        }

        return redirect()->back()->with('success', 'تم إضافة المستخدم بنجاح');
    }

    public function edit_user_child($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit_child', compact('user'));
    }

    public function update_user_child(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username,' . $id . '|max:255',
            'email' => 'required|email|unique:users,email,' . $id . '|max:255',
            'age' => 'required|integer|min:0|max:100',
            'preferred_language' => 'required|in:java,javascript,python,php',
            'interests' => 'required|array',
            'interests.*' => 'in:sports,music,reading',
        ]);

        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->age = $validatedData['age'];
        $user->preferred_language = $validatedData['preferred_language'];
        $user->interests = json_encode($validatedData['interests']);

        if ($request->hasFile('profile_img')) {
            $user->clearMediaCollection('profile_images');
            $user->addMedia($request->file('profile_img'))->toMediaCollection('profile_images');
        }

        $user->save();

        return redirect()->back()->with('success', 'تم تحديث المستخدم بنجاح');
    }

}

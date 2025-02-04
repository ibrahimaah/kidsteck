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
        $users = User::with('role')->where('role_id','!=',1)
                                   ->where('role_id','!=',4)
                                   ->paginate(10);
                                   
        return view('admin.users.index', ['users' => $users]);
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

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed', // Optional if password is not updated
            'role_id' => 'required|integer|exists:roles,id',
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update the user details
        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        
        // Update password only if it's provided
        if ($validatedData['password']) {
            $user->password = Hash::make($validatedData['password']);
        }
        
        $user->role_id = $validatedData['role_id'];

        // Save the updated user
        $user->save();

        // Redirect with success message
        return redirect()->back()->with('success', 'تم تحديث بيانات المستخدم بنجاح');
    }

    public function delete($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'تم حذف المستخدم بنجاح');
    }

    public function show($id)
    {
         // Find the user by ID
        $user = User::findOrFail($id);
        // Return the show view with user data
        return view('admin.users.show', ['user' => $user]);
    }
    public function create_user_child()
    {

    }
}

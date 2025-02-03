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

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
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

    }
}

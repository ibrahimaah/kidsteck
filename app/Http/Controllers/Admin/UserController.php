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

     
 
}

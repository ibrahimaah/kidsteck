<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\KidActivityLog;
use App\Models\Story;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ParentDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::user()->is_parent()) {
                abort(403, 'فقط المستخدم من النوع ولي أمر يحق له الوصول إلى الصفحة');
            }
            return $next($request);
        });
    }

    public function manage_childs_accounts()
    {
        return view('site.parent.manage-childs-accounts.index');
    }
    public function index()
    {
        return view('site.parent.dashboard');
    }

    public function create_child($parent_id)
    {
        return view('site.parent.manage-childs-accounts.create_child', ['parent_id' => $parent_id]);
    }

    
    public function store_child(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'required',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'age' => 'required|integer|min:0|max:17',
            'preferred_language' => 'required|in:java,javascript,python,php',
            'interests' => 'required|array',
            'interests.*' => 'in:sports,music,reading',
        ]);

        $parent_id = $validatedData['parent_id'];
        $name = $validatedData['name'];
        $email = $validatedData['email'];
        $password = bcrypt($validatedData['password']); // Hash the password
        $age = $validatedData['age'];
        $preferredLanguage = $validatedData['preferred_language'];
        $interests = json_encode($validatedData['interests']); // Convert array to JSON

        // Create User manually
        $user = new User();
        $user->name = $name;
        $user->username = $name;
        $user->email = $email;
        $user->password = $password;
        $user->age = $age;
        $user->preferred_language = $preferredLanguage;
        $user->interests = $interests;
        $user->role_id = 4;
        $user->parent_id = $parent_id;
        $user->save();

        return redirect()->back()->with('success', 'تم إضافة حساب الطفل بنجاح');
    }

    public function edit_child($user_id) {
        $user = User::findOrFail($user_id);
        return view('site.parent.manage-childs-accounts.edit_child',['user' => $user]);
    }


    public function update_child(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,$id|max:255",
            'password' => 'nullable|string|min:6|confirmed',
            'age' => 'required|integer|min:0|max:17',
            'preferred_language' => 'required|in:java,javascript,python,php',
            'interests' => 'required|array',
            'interests.*' => 'in:sports,music,reading',
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->age = $validatedData['age'];
        $user->preferred_language = $validatedData['preferred_language'];
        $user->interests = json_encode($validatedData['interests']);

        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->save();

        return redirect()->back()->with('success', 'تم تحديث حساب الطفل بنجاح');
    }


    public function remove_child($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();
        return redirect()->back()->with('success', 'تم حذف حساب الطفل بنجاح');
    }

    public function track_child($user_id)
    {
        $stories = Story::with('parts')->get();
        $user = User::findOrFail($user_id);
        
        $seconds = KidActivityLog::where('kid_id', $user->id)->sum('duration');
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds % 3600) / 60);
        $remainingSeconds = $seconds % 60;
        
        $lastLog = KidActivityLog::where('kid_id', $user_id)
        ->latest('login_at') // Get the latest login entry
        ->first();

        return view('site.parent.manage-childs-accounts.track',compact('stories','user','seconds','hours','minutes','remainingSeconds','lastLog'));
    }
}

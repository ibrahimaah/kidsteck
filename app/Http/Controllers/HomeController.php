<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Story;
use App\Models\User;
use App\Models\UserPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    { 
        $num_of_quizzes = Question::distinct('story_part_id')->count('story_part_id');
        $num_of_kids = User::where('role_id',4)->count();
        $num_of_stories = Story::where('is_active',true)->count();
        $topKids = UserPoint::select('user_id', DB::raw('SUM(points) as total_points'))
                             ->with('user') // eager load the kid info
                             ->groupBy('user_id')
                             ->orderByDesc('total_points')
                             ->limit(3)
                             ->get();

        return view('index',compact('num_of_quizzes','num_of_kids','num_of_stories','topKids'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Enums\Reason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPointController extends Controller
{
    // public function award_points()
    // {
    //     /** @var \App\Model\User $current_user */
    //     $user_id = Auth::id();
    //     $is_success = awardPoints($user_id,1,Reason::WatchingVideo->value);
    //     if ($is_success) 
    //     {
    //         return response()->json(['code' => 1 , 'data' => true]);
    //     }
    //     else 
    //     {
    //         return response()->json(['code' => 0 , 'msg' => 'error']);
    //     }
    // }
}

<?php

namespace App\Listeners;

use App\Models\KidActivityLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogKidLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $user = $event->user;
        
        if ($user->role_id == '4') 
        { // Adjust role check if necessary
            KidActivityLog::create([
                'kid_id' => $user->id,
                'login_at' => now(),
            ]);
        }
    }
}

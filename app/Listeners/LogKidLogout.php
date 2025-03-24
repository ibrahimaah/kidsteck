<?php

namespace App\Listeners;

use App\Models\KidActivityLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogKidLogout
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

        if ($user->role_id == '4') {
            $log = KidActivityLog::where('kid_id', $user->id)
                ->whereNull('logout_at')
                ->latest()
                ->first();
            
            if ($log) {
                $log->update([
                    'logout_at' => now(),
                    'duration' => now()->diffInSeconds($log->login_at),
                ]);
            }
        }
    }
}

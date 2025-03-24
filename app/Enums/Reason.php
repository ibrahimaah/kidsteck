<?php

namespace App\Enums;

enum Reason: string
{
    case WatchingVideo = 'watching_video';
    case Quiz = 'quiz';
    case Login = 'login';
}

<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function view()
    {
        $data['task'] = Task::where('users_id', Auth::user()->id)->where('is_completed', 0)->orderByDesc('is_pinned')->orderBy('created_at', 'desc')->get();
        return view('user.dashboard', $data);
    }

    public function finishedview()
    {
        $data['task'] = Task::where('users_id', Auth::user()->id)->where('is_completed', 1)->orderByDesc('is_pinned')->orderBy('created_at', 'desc')->get();
        return view('user.finished', $data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function index()
    {
        $is_admin = Auth::user()->is_admin;
        $user_id = Crypt::encrypt(Auth::user()->id);

        if ($is_admin == 1) {
            return  redirect()->route('admin.index');
        } else {
            return redirect()->route('student.index', $user_id);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        $user_id = Crypt::encrypt(Auth::user()->id);

        switch ($role) {
            case "admin":
                return  redirect()->route('admin.index');
                break;
            case "student":
                return redirect()->route('student.index', $user_id);
                break;
        }
    }
}

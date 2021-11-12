<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\Career;
use App\Enums\Role;

class UserController extends Controller
{

    public function password()
    {
        return view('auth.forgot-password');
    }

    public function GradutateRegister()
    {
        $data['careers'] = Career::all();
        return view('auth.register', $data);
    }

    public function index()
    {
        $role = Auth::user()->role;
        $user_id = Crypt::encrypt(Auth::user()->id);

        switch ($role) {
            case Role::Administrator:
                return  redirect()->route('admin.index');
                break;
            case Role::Student:
                return redirect()->route('student.index', $user_id);
                break;
            case Role::Company:
                return redirect()->route('company.index', $user_id);
                break;
        }
    }
}

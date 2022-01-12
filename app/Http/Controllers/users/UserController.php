<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

abstract class UserController extends Controller
{
    protected abstract function index();

    protected abstract function profileView();

    protected abstract function logout();
    
}

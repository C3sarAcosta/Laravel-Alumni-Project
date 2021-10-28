<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
  public function AdminIndexView()
  {
    return view('admin.index');
  }

  public function AdminProfileView()
  {
    return view('admin.show');
  }

  public function AdminLogout()
  {
    Auth::logout();
    return Redirect()->route('login');
  }
}

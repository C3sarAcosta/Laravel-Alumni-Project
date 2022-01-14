<?php

namespace App\Http\Controllers\backend\configuration;

use App\Http\Controllers\backend\configuration\ConfigurationController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
//Constants
use App\Constants\Constants;

class UsersConfigurationController extends ConfigurationController
{
    public function view()
    {
        $data['allData'] = User::where('role', Constants::ROLE['Committee'])
            ->orWhere('role', Constants::ROLE['Administrator'])->get();
        return view('backend.configuration.users.view_users', $data);
    }

    public function add()
    {
        return view('backend.configuration.users.add_users');
    }

    public function store(Request $request)
    {
        $request->validate(['email' => 'required|unique:users,email']);

        $users = new User();
        $this->saveController($users, $request);

        $this->notification['message'] = 'Usuario agregado correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('users.configuration.view')->with($this->notification);
    }

    public function edit($id)
    {
        $data['editData'] = User::find($id);
        return view('backend.configuration.users.edit_users', $data);
    }

    public function update(Request $request)
    {
        $users = User::find($request->company_id);
        $request->validate(['email' => 'required|unique:users,email,' . $users->id]);

        $this->saveController($users, $request);

        $this->notification['message'] = 'Usuario actualizado correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('users.configuration.view')->with($this->notification);
    }

    public function delete(int $id)
    {
        $users = User::find($id);
        $users->delete();

        $this->notification['message'] = 'Usuario eliminado correctamente.';
        $this->notification['alert-type'] = Constants::ALERT_TYPE['Success'];

        return redirect()->route('users.configuration.view')->with($this->notification);
    }

    public function saveController(User $users, Request $request)
    {
        $users->name = trim($request->name);
        $users->email = trim($request->email);
        $users->password = Hash::make($request->password);
        $users->role = $request->role;
        $users->save();
    }
}

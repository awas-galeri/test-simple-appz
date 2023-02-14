<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function index()
    {
        $role = Role::all();
        $user = User::all();
        return view('dashboard.users.index', [
            'title' => 'Users',
            'active' => 'users',
            'index' => 'users',
            'users' => $user,
            'roles' => $role,
        ]);
    }

    public function json()
    {
        return datatables()->of(User::query())->toJson();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function create(Request $request)
    {
        // dd($request->all());
        User::create([
            'username' => Str::lower((str_replace(' ', '', $request->name))),
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'phone' => $request->phone,
            'password' => Hash::make('password'),
        ]);

        return redirect()->back();
    }

    public function edit($id)
    {
        $role = Role::all();
        $user = User::findOrFail($id);
        return view('dashboard.users.edit', [
            'title' => 'Edit User',
            'active' => 'users',
            'index' => 'users',
            'users' => $user,
            'roles' => $role,
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'username' => Str::lower((str_replace(' ', '', $request->name))),
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'phone' => $request->phone,
        ]);

        return redirect()->route('users')->with('success', 'User updated successfully');
    }
}

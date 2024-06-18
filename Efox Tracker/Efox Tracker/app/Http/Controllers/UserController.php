<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Contracts\Role;

class UserController extends Controller
{

    public function index() 
    {
        $users = User::all();

        return view('navigation.role-permission.user.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = DB::table('roles')->pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name', 'name')->all();
        
        return view('navigation.role-permission.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],          
            'email' => ['required', 'string', 'email', 'max:255'],
            'roles' => 'required',
        ]);
    
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        $user->update($data);
        $user->syncRoles($request->roles);
    
        return redirect('/user')->with('message', 'User updated successfully');
    }
    
}

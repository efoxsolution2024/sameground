<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index() {

        $roles = Role::all();   

        return view('navigation.role-permission.roles.index', compact('roles'));
    }
    
    public function create() {
        return view('navigation.role-permission.roles.create');
    }
    
    public function store(Request $request) { 
        $validate = $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name',
            ]
        ]);

        $role = Role::create(['name' => $request->name]);

        return redirect('role')->with('message', 'Role Created');
     }

    public function edit(Role $role)
    {      

        return view('navigation.role-permission.roles.edit', compact('role'));
        
    }

    public function update(Request $request, Role $role) 
    {
        $validate = $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,'.$role->id
            ]
        ]);

        $role->update([
            'name' => $request->name
        ]);

        return redirect('role')->with('message', 'Role Updated');

    }
    public function destroy(Request $request, $id) {
        $role = Role::findOrFail($id);

        $role->delete();
        return redirect('role')->with('message', 'Role Deleted');
    }

    public function addPermissionToRole($id)
    {

        $permissions = Permission::get();
        $role = Role::findOrFail($id);
        $rolePermissions = DB::table('role_has_permissions')
                                ->where('role_has_permissions.role_id', $role->id)
                                ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                                ->all();


        return view('navigation.role-permission.roles.add-permissions', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions,
        ]);
    }

    public function givePermissionToRole(Request $request, $id) 
    {
        $validate = $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($id);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('message', 'Permission added to Role');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index() {

        $permissions = Permission::all();   

        return view('navigation.role-permission.permission.index', compact('permissions'));
    }
    
    public function create() {
        return view('navigation.role-permission.permission.create');
    }
    
    public function store(Request $request) { 
        $validate = $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name',
            ]
        ]);

        $permission = Permission::create(['name' => $request->name]);

        return redirect('permission')->with('message', 'Permission Created');
     }

    public function edit(Permission $permission)
    {      

        return view('navigation.role-permission.permission.edit', compact('permission'));
        
    }

    public function update(Request $request, Permission $permission) 
    {
        $validate = $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name,'.$permission->id
            ]
        ]);

        $permission->update([
            'name' => $request->name
        ]);

        return redirect('permission')->with('message', 'Permission Updated');

    }
    public function destroy(Request $request, $id) {
        $permission = Permission::findOrFail($id);

        $permission->delete();
        return redirect('permission')->with('message', 'Permission Deleted');
    }
}

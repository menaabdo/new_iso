<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Permission;
use Exception;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:roles-create');
        $this->middleware('permission:roles-read');
        $this->middleware('permission:roles-update');
        $this->middleware('permission:roles-delete');
    }

    public function index()
    {
        $roles = Role::get();
        return view('roles.index',compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('roles.create',compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $role = new Role();
            $role->name = $request->name;
            $role->display_name = ucwords($request->name);
            $role->description = $request->description;
            $role->save();
            $role->attachPermissions($request->permissions);
            DB::commit();

            return redirect()->route('index.roles')->with('success','Role Created Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function edit($roleId)
    {
        $role = Role::findOrFail($roleId);
        $permissions = Permission::get();
        $role_permissions = $role->permissions->pluck('id')->toArray();
        return view('roles.edit',compact('role','permissions','role_permissions'));
    }

    public function update(RoleRequest $request,$roleId)
    {
        $role = Role::findOrFail($roleId);
        try
        {
            DB::beginTransaction();
            $role->name = $request->name;
            $role->display_name = ucwords($request->name);
            $role->description = $request->description;
            $role->save();
            $role->syncPermissions($request->permissions);
            DB::commit();

            return redirect()->route('index.roles')->with('success','Role Updated Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function show($roleId)
    {
        $role = Role::findOrFail($roleId);
        return view('roles.show',compact('role'));
    }

    public function destroy($roleId)
    {
        $role = Role::findOrFail($roleId);
        $role->detachPermissions($role->permissions);
        $role->delete();
        return redirect()->route('index.roles')->with('success','Role Deleted Successfully');
    }
}

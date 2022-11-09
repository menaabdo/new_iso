<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Exception;

class PermissionController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:permissions-create');
        $this->middleware('permission:permissions-read');
        // $this->middleware('permission:permissions-update');
        $this->middleware('permission:permissions-delete');
    }

    public function index()
    {
        $permissions = Permission::get();
        return view('permissions.index',compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(PermissionRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $permission = new Permission();
            $permission->name = str_replace(' ','-',strtolower($request->name));
            $permission->display_name = ucwords($request->name);
            $permission->description = $request->description;
            $permission->save();
            DB::commit();

            return redirect()->route('index.permissions')->with('success','Permission Created Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function edit($permissionId)
    {
        $permission = Permission::
        OrFail($permissionId);
        return view('permissions.edit',compact('permission'));
    }

    public function update(PermissionRequest $request,$permissionId)
    {
        $permission = Permission::findOrFail($permissionId);
        try
        {
            DB::beginTransaction();
            $permission->name = str_replace(' ','-',strtolower($request->name));
            $permission->display_name = ucwords($request->name);
            $permission->description = $request->description;
            $permission->save();
            DB::commit();

            return redirect()->route('index.permissions')->with('success','Permission Updated Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function show($permissionId)
    {
        $permission = Permission::findOrFail($permissionId);
        return view('permissions.show',compact('permission'));
    }

    public function destroy($permissionId)
    {
        $permission = Permission::findOrFail($permissionId);
        $permission->delete();
        return redirect()->route('index.permissions')->with('success','Permission Deleted Successfully');
    }
}

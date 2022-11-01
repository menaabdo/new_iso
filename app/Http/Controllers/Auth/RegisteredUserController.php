<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Permission;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */

    public function index()
    {
        $users = User::get();
        return view('users.index',compact('users'));
    }

    public function create()
    {
      
        $roles = Role::get();
        $permissions = Permission::get();
        return view('users.create',compact('roles','permissions'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($user));

        // Auth::login($user);
        if($request->roles)
        {
            $user->attachRoles($request->roles);
        }
        // if($request->permissions)
        // {
        //     $user->attachPermissions($request->permissions);
        // }

        return redirect()->route('users.index')
                        ->with('success','User Added successfully');
    }
}

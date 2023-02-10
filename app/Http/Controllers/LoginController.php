<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Storage;


class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function handleLogin(Request $request)
    {
        
        // $request->validate([
        //     'email' => 'required|email|max:100',
        //     'password' => 'required|string|max:50|min:8'
        // ]);
            $expire_date=User::where(function ($query) use ($request){
                $query-> where('email',$request->email);
                $query->where('expire_date','>=',Carbon::now()->timezone('Africa/Cairo'));
            })->orWhere(function ($query) use ($request){
                $query->where('email',$request->email);
                $query->where('expire_date',null);
            })->first();
                    if($expire_date){
                        $is_login = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                            if (!$is_login) {
                                return back();
                            }

                            return Redirect::to('/');
                    }else{
                        return redirect()->back()->with('success', 'صلاحية البرنامج انتهت برجاء الاتصال بالإداره');
                    }
        
    }


    public function logout()
    {
        auth::logout();
        return redirect()->route('login');
    }
}
?>
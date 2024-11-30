<?php

namespace App\Http\Controllers;

use App\Events\LogoutEvent;
use App\Events\RegisterEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
        public function register()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        // validation
        request()->validate([
            'name'=> 'required|min:3',
            'email'=>'required |email',
            'password'=>'required|min:8'
        ]);
        $user=User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        
        RegisterEvent::dispatch($user);

        return redirect()->route('auth.login');

    }
    public function check(Request $request)
    {
        $data=$request->validate([
            'email'=>'required |email',
            'password'=>'required|min:8'
        ]);

        if(Auth::attempt($data))
        {
            //session fixation
            $request->session()->regenerate();
            if(Auth::user()->role==='admin') {
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('HOME');
        }
        }
        return redirect()->back()->withErrors(['error'=> 'email or password is not correct']);
    }

    public function index()
    {
        return view("user.home");
    }
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function logout(Request $request)
    {
        $user=Auth::user();
        LogoutEvent::dispatch($user);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('HOME'); // redirect to home not login bcs the user may wants to shopping the product not added it

        
    }

}

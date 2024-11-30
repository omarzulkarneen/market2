<?php

namespace App\Http\Controllers\API;

use App\Events\RegisterEvent;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestApiController extends Controller
{
    public function index(){
        $user=User::get();
        return response()->json([
            'data'=>$user
        ]);
    }

    public function store(Request $request){
        $user=User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ]);
        return response()->json([
            'data'=>$user
        ]);


    }

    public function show($id){
        $user=User::where('id',$id)->first();
        return response()->json([
            'data'=>$user
        ]);
    }

    public function update(Request $request, $id){
       
        $user=User::find($id);

        if($request->has('password')){[
           'password' => Hash::make($request->password)
        ];
        }
       
        $user->update( $request->all());
        return response()->json([
            'data'=>$user
        ]);
    }

    public function delete($id){
       
        $user=User::find($id);
       
        $user->delete();
        return response()->json([
            'data'=>$user
        ]);
    }
}

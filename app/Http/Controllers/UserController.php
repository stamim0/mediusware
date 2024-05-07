<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function index(){
        $list = Transaction::where('user_id',auth()->user()->id)->latest()->get();
        return view('Frontend.user.dashboard',compact(['list'])) ;
    }
    public function auth(){
        return view('Frontend.user.auth') ;
    }
    public function signup(Request $request){
        if($request->isMethod('post')){

            try {
                $request->validate([
                    'name'=>'required',
                    'account_type'=>'required',
                    'email'=>'required|unique:users,email',
                    'password'=> 'required|confirmed|min:8'
                ]);
    
                $user = new User();
                $user->name = $request->name ;
                $user->account_type = $request->account_type ;
                $user->email = $request->email ;
                $user->password = $request->password ;
    
                if($user->save()){
                    Auth::attempt(['email'=>$request->email , 'password'=>$request->password]) ;
                    return redirect()->route('dashboard')->with(['response'=>'successs','msg'=>'Signup Successful']);
                }else {
                    return back()->with(['response'=>'error','msg'=>'Signup Fail! ']);
                }
            } catch (\Throwable $th) {
                return back()->with(['response'=>'error','msg'=>'Error Occured'.$th->getMessage()]);
            }
        }
       
    }

    public function login(Request $request){
        if($request->isMethod('post')){

            try {
                $request->validate([
                    'email'=>'required',
                    'password'=> 'required'
                ]);
                if(Auth::attempt(['email'=>$request->email , 'password'=>$request->password])){
                    
                    return redirect()->route('dashboard')->with(['response'=>'successs','msg'=>'login Successful']);
                }else {
                    return back()->with(['response'=>'error','msg'=>'login Fail! ']);
                }
            } catch (\Throwable $th) {
                return back()->with(['response'=>'error','msg'=>'Error Occured'.$th->getMessage()]);
            }
        }

    }
    public function logout(){
        auth()->logout();
        return redirect()->route('index');
    }
}

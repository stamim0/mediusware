<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function deposit(Request $request ){
        if($request->isMethod('post')){

         
            $data = new Transaction() ;
               
           
            $request->validate([
                'amount'=>'required',
            ]);

            $data->user_id = auth()->user()->id ; 
            $data->transaction_type = 'deposit' ; 
            $data->amount = $request->amount ; 
                    
         
            if($data->save()){
                    return back()->with(['response'=>'success','msg'=>'Created successfully']);
            }
            else{
                    return back()->with([ 'response'=>'error', 'msg'=>'Something went wrong ']);

            }
        }
        $list = Transaction::where('transaction_type','deposit')->latest()->get() ;
            
        return view('frontend.transaction.deposit',compact(['list']));
    }

    public function withdrawl(Request $request ){
        if($request->isMethod('post')){

         
            $data = new Transaction() ;
               
           
            $request->validate([
                'amount'=>'required',
            ]);

            $data->user_id = auth()->user()->id ; 
            $data->transaction_type = 'withdrawl' ; 
            $data->amount = $request->amount ; 
                    
         
            if($data->save()){
                    return back()->with(['response'=>'success','msg'=>'Created successfully']);
            }
            else{
                    return back()->with([ 'response'=>'error', 'msg'=>'Something went wrong ']);

            }
        }
        $list = Transaction::where('transaction_type','withdrawl')->latest()->get() ;
            
        return view('frontend.transaction.withdrawl',compact(['list']));
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\product;
use App\Models\card;
use  Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class usercontroller extends Controller
{
    function create(Request $request){
        
        $request->validate([
           'name' => 'required',
           'email' => 'required|email|unique:users,email',
            'phone' => 'required',
           'password' => 'required|min:5|max:30',
           'cpassword' => 'required|min:5|max:30|same:password' 
            
        ]);
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
         $user->phone = $request->phone;
        $user->password = \Hash::make($request->password);
        $save = $user->save();
        
        if($save){
            return redirect()->back()->with('success','register is success');
        }else{
             return redirect()->back()->with('fail','register is fail');
        }
    }
    function check(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:30'
            
        ],[
            
             'email.exists' => 'this is email do not exists on user table'
        ]);
        
        $credit = $request->only('email','password');
        
         if(Auth::guard('web')->attempt($credit)){
            return redirect()->route('user.home');
        }else{
            
             return redirect()->route('user.login')->with('fail','wrong user logged');
        }
        
        
    }
     function logout(){
        
        Auth::guard('web')->logout();
        
        return redirect('/');
    }
    function displayproduct(){
        $data = product::all();
        $user = auth()->user();
         $count = card::where('phone','=',$user->phone)->count();
        return view('dashboard.user.product',compact('data','count'));
        
    }
    function addcard(Request $request,$id){
        
        if(Auth::guard('web')->id()){
            $user = auth()->user();
            $product = product::find($id);
            $card = new card();
            
            $card->name = $user->name;
            $card->phone = $user->phone;
            $card->address = $user->address;
            $card->product_name = $product->name;
            $card->price = $product->price;
            $card->quantity = $request->quantity;
            $card->save();
            
            return redirect()->back();
            
        }
        else{
           
            return redirect()->route('user.login');
        }
    }
    function showcard(){
        
        $user = auth()->user();
        $card = card::where('phone','=',$user->phone)->get();
        
        $count = card::where('phone','=',$user->phone)->count();
       if($card->count()>0){
           return view('dashboard.user.showcart',compact('count','card'));
       } else{
           abort(404);
       }
        
    }
    function search(Request $request){
        $data = product::where('name','=',$request->search)->get();
         $user = auth()->user();
          $count = card::where('phone','=',$user->phone)->count();
        $search = $request->search;
       
            return view('dashboard.user.search',compact('data','count','search'));
        
    }
    function delete($id){
        
        $cart = card::find($id)->delete();
        
        return back()->with('product','product is delete');
    }
}

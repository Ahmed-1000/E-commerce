<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\product;
use  Illuminate\Support\Facades\Auth;

class admincontroller extends Controller
{
    function check(Request $request){
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30'
            
        ],[
            
            
            'email.exists'=>'this is email is noy exists in admin table'
        ]);
        
        $creds = $request->only('email','password');
        
        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.Home');
        }else{
            
             return redirect()->route('admin.login')->with('fail','wrong admin logged');
        }
     
    }
    function logout(){
        
        Auth::guard('admin')->logout();
        
        return redirect()->route('landhome');
    }
    function productupload(Request $request){
        
        $data = new product();
        
        $data->name = $request->name;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->description = $request->des;
        if($request->hasfile('files')){
            $file = $request->file('files');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('productimage',$filename);
            $data->files =  $filename;
        }
        $data->save();
        
        return redirect()->back()->with('message','success Add new product');
    }
    function products(){
        
        $data = product::all();
          return view('dashboard.admin.products',compact('data'));
    }
    function edit($id){
        $data = product::find($id);
        
        return view('dashboard.admin.edit',compact('data'));
    }
     function update(Request $request, $id){
        $data = product::find($id);
          $data->name = $request->name;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->description = $request->des;
    
          $data->update();
        return redirect('admin/products')->with('status','Data update successfully');
    }
     function delete($id){
        
        $product = product::find($id)->delete();
        
        return back()->with('product','product is delete');
    }
}
    


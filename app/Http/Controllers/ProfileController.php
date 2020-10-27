<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
      
       
      

//    public function profile($id){
//     if(Auth::user()){
//         $user = User::find($id);
//         if($user){
//             return view('user.profile')->withUser($user);
//         }else{

//          return redirect()->back();
//         }
        
//     }
//   }

  
//   public function user_profile($id){
//     if(Auth::user()){
//         $user = User::find($id);
//         if($user){
//             return view('user.user_profile')->withUser($user);
//         }else{

//          return redirect()->back();
//         }
        
//     }
//   }

//   public function photo(){
//     if(Auth::user()){
//         $user = User::find(Auth::user()->id);
//         if($user){
//             return view('user.photo')->withUser($user);
//         }else{

//          return redirect()->back();
//         }
        
//     }
//   }

//   public function user_photo(){
//     if(Auth::user()){
//         $user = User::find(Auth::user()->id);
//         if($user){
//             return view('user.user_photo')->withUser($user);
//         }else{

//          return redirect()->back();
//         }
        
//     }
//   }

  public function edit(){
    if(Auth::user()){
        $user = User::find(Auth::user()->id);
        if($user){
            return view('user.edit')->withUser($user);
        }else{

         return redirect()->back();
        }
        
    }
  }

  public function password(){
    if(Auth::user()){
        $user = User::find(Auth::user()->id);
        if($user){
            return view('user.password')->withUser($user);
        }else{

         return redirect()->back();
        }
        
    }
  }
  public function user_edit(){
    if(Auth::user()){
        $user = User::find(Auth::user()->id);
        if($user){
            return view('user.user_edit')->withUser($user);
        }else{

         return redirect()->back();
        }
        
    }
  }

   

  public function update_password(Request $request){
    $validate = $request->validate([
        'oldpassword' => 'required',
        'password' =>'required|required_with:confirm_password'
       ]);
    $user = User::find(Auth::user()->id);
    if($user){         
        if(Hash::check($request['oldpassword'],$user->password) && $validate)
        {
            $user->password = Hash::make($request['password']);
            $user->save();
            //$request->session()->flash('success','Password Updated successfully');         
            return redirect()->back()->with('success','Password Updated successfully');            
        }else{
            //$request->session()->flash('warning','Password do not match');         
            //return redirect()->route('users')
            return redirect()->back()->with('warning','Password do not match');
        }
         
        }     
    
    } 

  public function update(Request $request){
    $user = User::find(Auth::user()->id);
    if($user){
        $validate =null;
        if(Auth::user()->email === $request['email'])
        {
            $validate = $request->validate([
                'username' => 'required',
                'email' =>'required|email'
               ]);
        }else{
            $validate = $request->validate([
                'username' => 'required',
                'email' =>'required|email|unique:users',
                'email' =>'required|'
               ]);
        }
        if($validate){
            $user->username = $request['username'];
            $user->email = $request['email'];
            $user->save();
           // $request->session()->flash('success','Details Updated successfully');         
            return redirect()->back()->with('success','Details Updated successfully');         
        }
        return redirect()->back();
        }     
    
    } 
  }
   


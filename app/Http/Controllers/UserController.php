<?php

namespace App\Http\Controllers;

use App\Mail\NewUserMail;
use App\Profile;
use App\Rules\MatchOldPassword;
use App\Saving;
use App\Transaction;
use App\User;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $users = User::all();
        return view('admin.users.index', compact('users'));
    }   

    public function edit(User $user)
    {
        //$user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }
      
            
    public function update(Request $request, User $user)
    {
        //dd($request->all());
        if($user->update([
             
            'user_type' => $request->user_type            
        ])){
           return redirect()->route('users')->with('success', 'User Updated Successfully!');
        } 
         
    }

    public function adduser()
    {
        return view('admin.users.create');
    }

    public function createuser(Request $request)
    {
        $this->validate($request, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_type' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $data = $request->all();   
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data); 
            return redirect()->route('users')->with('success', 'User Created Successfully!');
          
    }
 

    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return redirect()->back()->with('warning', 'User Deleted!');
    }
}

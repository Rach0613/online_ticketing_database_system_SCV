<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function index(){
        return view('user.userLogin');
    }

    public function authenticate(Request $request) {

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password'=>'required'
        ]);

        if($validator-> passes()){

            if(Auth::attempt(['email'=> $request->email,'password'=>$request->password])) {
                return redirect()->route('account.dashboard');
            } else{
                return redirect()->route('account.login')->with('error','Either email or password is incorrect.');
            }

        }else{
            return redirect()-> route ('account.login')  
                ->withInput()
                ->withErrors($validator);
        }
    }

    //THis method will show register page
    public function register (Request $request){
        return view ('user.signup.signup_1');

    }

    public function processRegister(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'password' => 'required|min:8|confirmed',
        ]);
    
        // Combine country code and phone number
        $fullPhone = $request->country_code . $request->phone;
    
        // Create a new user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $fullPhone; // Assign combined phone number
        $user->password = Hash::make($request->password); // Hash the password
        $user->role = 'customer'; // Set default role
        $user->save(); // Save user to the database
    
        return redirect()
        ->route('account.login')
        ->with('success', 'Registration successful! Welcome to Sarawak Cultural Village.');
    
    }
  
    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }
}

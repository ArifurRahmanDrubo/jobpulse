<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Exception;
use App\Mail\OTPMail;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
   function companyRegistration(Request $request){
        try{
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:5',
            ]);
            User::create([
                'name'=> $request->input('name'),
                'email'=> $request->input('email'),
                'password'=> Hash::make($request->input('password')),
                'role'=>"companies" 
            ]);
            return response()->json(['status' => 'success', 'message' =>'User registration successfully']);

        } catch( Exception $e){
            return response()->json(['status' => 'fail', 'message'=> $e->getMessage()]);
        }
   }

   function candidateRegistration(Request $request){
    try{
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5',
        ]);
        User::create([
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'password'=> Hash::make($request->input('password')),
            'role'=>"candidates" 
        ]);
        return response()->json(['status' => 'success', 'message' =>'User registration successfully']);

    } catch( Exception $e){
        return response()->json(['status' => 'fail', 'message'=> $e->getMessage()]);
    }
}





function UserLogin(Request $request) {
    $request->validate([
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:5',
    ]);

    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $User = Auth::user();
        $token = $User->createToken('authToken')->plainTextToken;
        return response()->json(['status' => 'success', 'message' => 'Login Successful', 'token' => $token]);
    } else {
        return response()->json(['message' => 'Unauthorized'], 401);
    }
}

public function logout(Request $request)
{

    try {
       Auth::guard('web')->logout();
       $request->user()->tokens()->delete();
    //    return response()->json(['status' => 'fail', 'message' => 'User not authenticated'], 401);
        // if (!$user) {
        // }
        return redirect('/');
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()], 500);
    }
}

// public function logout(Request $request)
// {
//     if (Auth::guard('web')->guest()) {
//         return response()->json(['status' => 'fail', 'message' => 'User not authenticated'], 401);
// //         }
//     } else {
//         Auth::logout();
    
//     return redirect('/');
//     }  
// }

function Sentotp(Request $request){
    try {

        $request->validate([
            'email' => 'required|string|email|max:50'
        ]);

        $email=$request->input('email');
        $otp=rand(1000,9999);
        $count=User::where('email','=',$email)->count();

        if($count==1){
            Mail::to($email)->send(new OTPMail($otp));
            User::where('email','=',$email)->update(['otp'=>$otp]);
            return response()->json(['status' => 'success', 'message' => '4 Digit OTP Code has been send to your email !']);
        }
        else{
            return response()->json([
                'status' => 'fail',
                'message' => 'Invalid Email Address'
            ]);
        }

    }catch (Exception $e){
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}

function Verifyotp(Request $request){
    try {
        $request->validate([
            'email' => 'required|string|email|max:50',
            'otp' => 'required|string|min:4'
        ]);

        $email=$request->input('email');
        $otp=$request->input('otp');

        $user = User::where('email','=',$email)->where('otp','=',$otp)->first();

        if(!$user){
            return response()->json(['status' => 'fail', 'message' => 'Invalid OTP']);
        }

        // CurrentDate-UpdatedTe=4>Min

        User::where('email','=',$email)->update(['otp'=>'0']);

        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json(['status' => 'success', 'message' => 'OTP Verification Successful','token'=>$token]);

    }catch (Exception $e){
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}

function resetpassword(Request $request){
    try{
        $request->validate([
            'password' => 'required|string|min:3'
        ]);
        $user = Auth::user();
        $userId = $user->id;
        $password=$request->input('password');
        User::where('id','=',$userId)->update(['password'=>Hash::make($password)]);
        return response()->json(['status' => 'success', 'message' => 'Request Successful']);

    }catch (Exception $e){
        return response()->json(['status' => 'fail', 'message' => $e->getMessage(),]);
    }
}



}
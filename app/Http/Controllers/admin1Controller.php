<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Admin;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class admin1Controller extends Controller
{
    function adminLogin(Request $request){
    try{
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);
        $admin= Admin::where('username', $request->input('username'))->first();
        if(!$admin || !Hash::check($request->input('password') , $admin->password)){
            return response()->json(['status' => 'failed', 'message'=> 'Invalied User']);

    } 
    $token = $admin->createToken('authToken')->plainTextToken;
    return response()->json(['status' => 'success', 'message'=>'Login Succesful','token'=>$token]);
}
catch(Exception $exception){
    return response()->json(['status' => 'fail', 'message'=> $exception->getMessage()]);
}
}
}

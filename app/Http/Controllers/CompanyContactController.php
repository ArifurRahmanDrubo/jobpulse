<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\CompanyContact;
use Illuminate\Support\Facades\Auth;

class CompanyContactController extends Controller
{
    function contact(Request $request){
        try {
             CompanyContact::create([
                'user_id' => auth()->user()->id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'designation' => $request->designation
            ]);
            return response()->json(['status' => 'success', 'message' => 'Company Contact Created Successfully',]);
           
            
        } catch(Exception $e) {
            // Return error message if an exception occurs
            return response()->json([
                'error' => $e->getMessage()
            ], 500); // You can change the status code as needed
        }
    }
function companyContact(Request $request){
    $companies = CompanyContact::where('user_id', auth()->user()->id)->first();
    if($companies){
        return view('companies.pages.contact-page', compact('companies'));
        
    }else{
  return view('companies.pages.createContactpage', compact('companies'));
        
    }
}
function CompanyContactByID(Request $request){
    try {
        
        $company_id=$request->input('id');
        $user_id=Auth::id();
        $rows= CompanyContact::where('id',$company_id)->where('user_id',$user_id)->first();
        return response()->json(['status' => 'success', 'rows' => $rows]);
    }catch (Exception $e){
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}
// function updateCompanyContact(Request $request){
//     try{
//         $data = CompanyContact::where( 'user_id', $request->user_id)->update([
//             'name' => $request->name,
//             'email' => $request->email,
//             'phone' => $request->phone,
//             'designation' => $request->designation
//         ]);
//         return response()->json([
//             'message' => 'Profile Deleted Successfully',
//             'details' => $data
//         ]);
//     }
//     catch(Exception $e){
//         return $e->getMessage();
//     }
// }
public function updateCompanycontact(Request $request)
    {
        try {
            $companies = CompanyContact::find($request->id);
            if (!$companies) {
                return response()->json(['status' => 'fail', 'message' => 'Company not found.'], 404);
            }
            $companies->name = $request->name;
            $companies->email = $request->email;
            $companies->phone = $request->phone;
            $companies->designation= $request->designation;
          

            $companies->save();
    
            // Return success response
            return response()->json(['status' => 'success', 'message' => 'Company contact updated successfully.']);
        } catch (Exception $e) {
            // Handle any exceptions and return error response
            return response()->json(['status' => 'error', 'message' => 'Failed to update company contact.'], 500);
        }
    }



}
<?php

namespace App\Http\Controllers;


use Exception;
use App\Models\Job;
use App\Models\user;
use App\Mail\OTPMail;
use App\Models\Company;
use App\Models\AppliedJob;
use Illuminate\Http\Request;
use App\Models\CompanyContact;
use App\Models\CandidateProfile;
use Illuminate\Support\Facades\Validator;
use App\Models\CandidateExperience;
use App\Models\CandidateSalary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    public function profile(Request $request)
    {
            Company::create([
                'user_id' => auth()->user()->id,
                'year_of_establishment' => $request->year_of_establishment,
                'description' => $request->description,
                'type' => $request->type,
                'website' => $request->website,
                'license' => $request->license,
            ]);

           return redirect()->back()->with('success', 'Profile created successfully.');
       
    }

    public function index()
    {
        if (auth()->user()->role == 'companies') {
            $totalJobPost = Job::where('user_id', auth()->user()->id)->count();
            $details = AppliedJob::where('company_id', auth()->user()->id)->count();
            return view('companies.analysis', compact('details', 'totalJobPost'));
        } else {
//return"loginRoute";
            return redirect('/login');
        }
    }

    public function createImg(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
                    'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as needed
                ], [
                    'img.image' => 'The uploaded file must be an image.',
                    'img.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
                    'img.max' => 'The image may not be greater than :max kilobytes in size.',
                ]);
        
        $image = $request->file('img');
        
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
       
        $image->move(public_path('images'), $imageName);
     
        $location = '/images/' . $imageName;
        $companyProfile = Company::where('user_id', auth()->user()->id);
        if ($companyProfile) {
            $companyProfile->update([
                'img' => $location,
            ]);
        } else {
            // If no CandidateProfile exists, create a new one
            Company::create([
                'user_id' => auth()->id(),
                'img' => $location,
            ]);
        }
    
        return response()->json(['status' => 'success', 'message' =>  'Profile updated successfully']);
    }

    function companyProfile(Request $request){
        
        $company = Company::where('user_id', auth()->user()->id)->first();
        if($company){
      return view('companies.pages.profile-page', compact('company'));
            
        }else{
      return view('companies.pages.createprofilepage', compact('company'));
            
        }
    }

    
    function CompanyByID(Request $request){
        try {
            $request->validate([
                'id' => 'required|min:1'
            ]);
            $company_id=$request->input('id');
            $user_id=Auth::id();
            $rows= company::where('id',$company_id)->where('user_id',$user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    public function updateCompanyProfile(Request $request)
    {
        try {
            $company = Company::find($request->id);
            if (!$company) {
                return response()->json(['status' => 'fail', 'message' => 'Company not found.'], 404);
            }
            $company->year_of_establishment = $request->year_of_establishment;
            $company->type = $request->type;
            $company->website = $request->website;
            $company->description = $request->description;
            $company->license = $request->license;

            $company->save();
    
            // Return success response
            return response()->json(['status' => 'success', 'message' => 'Company profile updated successfully.']);
        } catch (Exception $e) {
            // Handle any exceptions and return error response
            return response()->json(['status' => 'error', 'message' => 'Failed to update company profile.'], 500);
        }
    }

    public function appliedJobDetails(Request $request)
    {
        $details = AppliedJob::where('user_id', $request->user_id)->with('job', 'user', 'salary', 'company')->get();
        return response()->json($details);
    }
    function totalAppliedCount(Request $request){
        $details = AppliedJob::where('company_id', auth()->user()->id)->count();
     return view('companies.analysis', compact('details'));
       // return response()->json($details);
    }
    public function candidateDetails(Request $request)
    {

        $details = User::where('id', $request->user_id)->with('education', 'salary',)->first();
        $userProfile = CandidateProfile::where('user_id', $request->user_id)->first();
        $currentJob=AppliedJob::where('user_id', $request->user_id)->where('job_id', $request->job_id)->first();
        $experience = CandidateExperience::where('user_id', $request->user_id)->with('experience')->get();
        $salary=CandidateSalary::where('user_id', $request->user_id)->first();
     
      // return $details;
     // return $experience;
    return view('companies.pages.profile.cv', compact('details', 'experience', 'currentJob','userProfile','salary'));
       
       // return response()->json($details);
    }


}
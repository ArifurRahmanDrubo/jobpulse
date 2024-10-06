<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Candidate;
use App\Models\ShortList;
use App\Models\AppliedJob;
use Illuminate\Http\Request;
use App\Models\CandidateSalary;

class CandidateController extends Controller
{
    public function store(Request $request)
    {

        try {



            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'candidates',
            ]);
            return redirect('/login')->with('success', 'User created successfully.');
            //   return response()->json([
            //       'msg' => "success",
            //       'user' => $user
            //   ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    function candidateStore(Request $request)
    {
        try {
            dd($request->all());
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'candidates',
            ]);
            // return redirect('/login')->with('success', 'User created successfully.');
            return response()->json([
                'msg' => "success",
                'user' => $user
            ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    function profile(Request $request)
    {
        try {
            $details = Candidate::create([
                'user_id' => $request->user_id,
                'phone' => $request->phone,
                'f_name' => $request->f_name,
                'm_name' => $request->m_name,
                'dob' => $request->dob
            ]);
            return response()->json($details);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    function updateprofile(Request $request)
    {
        try {
            dd($request->all());
            $details = Candidate::where('user_id', $request->user_id)->update([
                'phone' => $request->phone,
                'f_name' => $request->f_name,
                'm_name' => $request->m_name,
                'dob' => $request->dob
            ]);
            return response()->json($details);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function appliedJob(Request $request)
    {

        if (!auth()->check()) {
            return redirect()->route('login')->withErrors(['error' => 'Please login to access this page.']);
        }

        if (auth()->user()->role != 'candidates') {
            return  response()->json(['status' => 'error', 'message' => 'You are not allowed to apply for this job.']);
        }

        // Check if the candidate has already applied for this job
        $existingApplication = AppliedJob::where('user_id', auth()->user()->id)
            ->where('job_id', $request->job_id)
            ->exists();
        if ($existingApplication) {
            return  response()->json(['status' => 'error', 'message' => 'You have already applied for this job.']);
        }
        $request->validate([
            'current_salary' => 'required',
            'excepted_salary' => 'required'
        ]);
        AppliedJob::create([
            'user_id' => auth()->user()->id,
            'job_id' => $request->job_id,
            'company_id' => $request->company_id
        ]);
        CandidateSalary::create([
            'user_id' => auth()->user()->id,
            'current_salary' => $request->current_salary,
            'excepted_salary' => $request->excepted_salary
        ]);
        return  response()->json(['status' => 'success', 'message' => 'Applied successfully.']);
    }
    function appliedJobPage(Request $request)
    {
        // $jobs = ShortList::where('user_id',auth()->user()->id)->with('job','company','appliedJob')->get();
        //return response()->json($jobs);
        $jobs = AppliedJob::where('user_id', auth()->user()->id)->with('job', 'company', 'is_short_list')->get();
        return view('candidates.pages.applied_job', compact('jobs'));
        // return $jobs;
    }
    function appliedJobList(Request $request)
    {
        // $jobs = ShortList::where('user_id',auth()->user()->id)->with('job','company','appliedJob')->get();
        //return response()->json($jobs);
        $jobs = AppliedJob::where('user_id', auth()->user()->id)->with('job', 'company', 'is_short_list')->get();
        return response()->json(['status' => 'success', 'jobs' => $jobs]);
        // return $jobs;
    }
    function shortlistJobs()
    {

        $jobs = AppliedJob::where('user_id', auth()->user()->id)->where('status', 'selected')->with('job', 'company')->get();
        // dd($jobs);
        return view('candidates.pages.shortList', compact('jobs'));
    }
    function appliedJobshortList()
    {

        $jobs = AppliedJob::where('user_id', auth()->user()->id)->where('status', 'selected')->with('job', 'company')->get();
        // dd($jobs);
        return response()->json(['status' => 'success', 'jobs' => $jobs]);
    }

    public function deleteappliedJob(Request $request)
    {

        try {

            AppliedJob::where('user_id', auth()->user()->id)->where('job_id', $request->id)->delete();
            return response()->json(['status' => 'success', 'message' =>  'Deleted successfully.']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }



    function candidateLogin(Request $request)
    {
        $user = User::where('email', $request->email)->where('password', $request->password)->first();

        if ($user) {

            if ($user->role == 'candidates') {
                return redirect('/candidates/dashboard');
            } else {
                return redirect('/candidate/register');
            }
        } else {
            return "Invalid Email or Password";
            // return redirect('/companies/register');
        }
    }







    function candidateDetails(Request $request)
    {

        $details = User::where('id', $request->user_id)->with('candidate', 'education', 'experience', 'training', 'skill')->first();
        return response()->json($details);
    }

    // function totalAppliedCount(Request $request){
    //     $details = AppliedJob::where('user_id', auth()->user()->id)->count();
    //  return view('candidates.home', compact('details'));
    //     //return response()->json($details);
    // }
}

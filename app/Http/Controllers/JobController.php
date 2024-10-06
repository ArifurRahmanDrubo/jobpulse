<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Job;
use App\Models\User;
use App\Models\ShortList;
use App\Models\AppliedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{

    public function jobs(Request $request)
    {

        return view('companies.pages.job.index');
    }

    public function jobslist(Request $request)
    {

        $jobs = Job::where('user_id', auth()->user()->id)->get();
        return response()->json(['status' => 'success', 'jobs' => $jobs]);
    }
    public function jobStore(Request $request)
    {
        try {
            // dd($request->all());
            Job::create([
                'user_id' => auth()->user()->id,
                //'user_id'=>$request->user_id,
                'title' => $request->title,
                'description' => $request->description,
                'exprience' => $request->exprience,
                'requirements' => $request->requirements,
                'responsibilities' => $request->responsibilities,
                'benefits' => $request->benefits,
                'location' => $request->location,
                'age' => $request->age,
                'salary' => $request->salary,
                'vacancy' => $request->vacancy,
                'tag' => $request->tag,
                'type' => $request->type,
                'employment_status' => $request->employment_status,
            ]);
            return redirect('/jobs')->with('success', 'Job created successfully');

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function jobById(Request $request)
    {
        try {
            $job_id=$request->input('id');
            $user_id=Auth::id();
            $rows= Job::where('id',$job_id)->where('user_id',$user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }

    }
    public function jobUpdate(Request $request)
    {
        try {
            // dd($request->all());
             Job::where('user_id', auth()->user()->id)->where('id', $request->id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'exprience' => $request->exprience,
                'requirements' => $request->requirements,
                'responsibilities' => $request->responsibilities,
                'benefits' => $request->benefits,
                'location' => $request->location,
                'age' => $request->age,
                'salary' => $request->salary,
                'vacancy' => $request->vacancy,
                'tag' => $request->tag,
                'type' => $request->type,
                'employment_status' => $request->employment_status,
            ]);
           
            return response()->json(['status' => 'success', 'message' =>  'Job updated successfully']);
            // return response()->json([
            //     'massage'=>'Data updated successfully',
            //     'data'=>$data
            // ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }
    public function jobDelete(Request $request)
    {
        try {
             Job::where('user_id', auth()->user()->id)->where('id', $request->id)->delete();
            return response()->json(['status' => 'success', 'message' =>  'Job Delete successfully']);
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }
    public function whoApplied(Request $request)
    {
        $jobs = AppliedJob::where('company_id', '=', auth()->user()->id)->with('job', 'user', 'is_short_list')->get();
       
        //$jobs= ShortList::with('job','user')->get();
       // return $jobs;
      // $jobs = ShortList::where('company_id', '=', auth()->user()->id)->with('job', 'user')->get();
       
        return view('companies.pages.job.whoApplied', compact('jobs'));
    }
    public function whoAppliedjoblist(Request $request)
    {
        $jobs = AppliedJob::where('company_id', '=', auth()->user()->id)->with('job', 'user', 'is_short_list')->get();
       
        //$jobs= ShortList::with('job','user')->get();
       // return $jobs;
      // $jobs = ShortList::where('company_id', '=', auth()->user()->id)->with('job', 'user')->get();
      return response()->json(['status' => 'success', 'jobs' => $jobs]);
     
    }
    public function rejectlist(Request $request)
    {
        $user_id = $request->user_id;
        $job_id = $request->job_id;
        AppliedJob::where('user_id', $user_id)
        ->where('job_id', $job_id)
        ->update(['status' =>$request->status]);
        return response()->json(['status' => 'success', 'message' =>  'status changed successfully']);
    }
    public function shortlisted(Request $request)
    {
        $user_id = $request->user_id;
        $job_id = $request->job_id;
        AppliedJob::where('user_id', $user_id)
        ->where('job_id', $job_id)
        ->update(['status' =>$request->status]);
        return response()->json(['status' => 'success', 'message' =>  'status changed successfully']);
    }
    function shortlistedUser(){

        $jobs = AppliedJob::where('company_id', '=', auth()->user()->id)->with('job', 'user')->where('status', 'selected')->get();
        
        return view('companies.pages.job.shortlistUser', compact('jobs'));
        
    }
}
    // $user = User::where('id', $user_id)->first();
        // $job = Job::where('id', $job_id)->select('title')->first();
        // $data = [
        //     'email' => $user->email,
        //     'name' => $user->name,
        //     'job' => $job->title,
        // ];

        // Mail::send(['html' => 'mail.shortList'], $data, function ($message) use ($data) {
        //     $message->to($data['email']);
        //     $message->subject('Shortlisted');
        // });
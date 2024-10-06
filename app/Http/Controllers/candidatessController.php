<?php

namespace App\Http\Controllers;


use Exception;
use App\Mail\OTPMail;
use App\Models\candidate;
use App\Models\ShortList;
use App\Models\AppliedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class candidateController extends Controller
{
    function appliedJobPage(Request $request){
        // $jobs = ShortList::where('user_id',auth()->user()->id)->with('job','company','appliedJob')->get();
          //return response()->json($jobs);
       $jobs = AppliedJob::where('user_id',auth()->user()->id)->with('job','company','is_short_list')->get();
      return view('candidates.pages.applied_job',compact('jobs'));
        // return $jobs;
      }

      function shortlistJobs(){
    
        $jobs = ShortList::where('user_id',auth()->user()->id)->with('job','company','appliedJob')->get();
        return view('candidates.pages.shortList',compact('jobs'));
    }
}




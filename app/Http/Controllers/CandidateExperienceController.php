<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\CandidateExperience;

class CandidateExperienceController extends Controller
{

    function jobExperience(){
        $experience = CandidateExperience::where('user_id',auth()->user()->id)->get();     
        return view('candidates.pages.experience',compact('experience'));
    }
    function jobExperienceCreate(Request $request){
        try{
            //dd($request->all());   
                $data = CandidateExperience::create([
                    'user_id'=>auth()->user()->id,
                    'dasignation'=>$request->dasignation,
                    'company_name'=>$request->company_name,
                    'joining_date'=>$request->joining_date,
                    'depature_time'=>$request->depature_time
                ]);
                return response()->json(['status' => 'success', 'message' =>  'Exprience  Create successfully']);

        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    function exprienceDelete(Request $request){

        CandidateExperience::where('user_id', auth()->user()->id)->where('id', $request->id)->delete();
        return response()->json(['status' => 'success', 'message' =>  'Exprience  Delete successfully']);
    }
}

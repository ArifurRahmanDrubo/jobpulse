<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\CandidateProfessionalTraining;

class CandidateProfessionalTrainingController extends Controller
{

    function jobTraning(){
        $traing =  CandidateProfessionalTraining::where('user_id',auth()->user()->id)->get();     
        
        if($traing){
            return view('candidates.pages.training',compact('traing'));
            
        }else{
        return view('candidates.pages.createTraining');
            
        }
    }
    function trainingCreate(Request $request){
        try{
            //dd($request->all());
            CandidateProfessionalTraining::create([
                'user_id' => auth()->user()->id,
                'name'=>$request->name,
                'institute_name'=>$request->institute_name,
                'completion_year'=>$request->completion_year
                
            ]);
            return response()->json(['status' => 'success', 'message' =>  'Training  Create successfully']);
           
        }catch(Exception $exception){
            return $exception->getMessage();
        }
        
    }
    function trainingIndex(){
        $trainings = CandidateProfessionalTraining::where('user_id',auth()->user()->id)->get();
        return view('candidates.pages.training',compact('trainings'));
    }
    function trainingDelete(Request $request){
        CandidateProfessionalTraining::where('user_id', auth()->user()->id)->where('id', $request->id)->delete();
        return response()->json(['status' => 'success', 'message' =>  'Training  Delete successfully']);
    }
}

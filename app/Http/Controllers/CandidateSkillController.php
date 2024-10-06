<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\CandidateSkill;

class CandidateSkillController extends Controller
{
    function candidateSkillPage(){
        $skills = CandidateSkill::where('user_id',auth()->user()->id)->get();
        return view('candidates.pages.skill',compact('skills'));
      
    }
    function Create(Request $request){
        try{


            //dd($request->all());
           CandidateSkill::create([
               'user_id'=>auth()->user()->id,
               'skill'=>$request->skill
              
            ]);
            

            return response()->json(['status' => 'success', 'message' =>  'Skill  Create successfully']);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    function candidateSkilledit(Request $request ,$id){
        $skills = CandidateSkill::where('user_id',auth()->user()->id)->where('id',$id)->get();
        if($skills){
            return view('candidates.pages.editskill',compact('skills'));
        }
      
    }
    function deleteSkill(Request $request){
        try{
            CandidateSkill::where('user_id', auth()->user()->id)->where('id', $request->id)->delete();
            return response()->json(['status' => 'success', 'message' =>  'Skill  Delete successfully']);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    function Delete(CandidateSkill $skill){
        $skill->delete();
        return redirect()->back()->with('warning', 'Skill deleted successfully');
    }
}

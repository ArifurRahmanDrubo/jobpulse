<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CandidateEducationDetails;

class CandidateEducationDetailsController extends Controller
{


    function educationCreatePage()
    {

        $education = CandidateEducationDetails::where('user_id', auth()->user()->id)->first();

        if ($education) {
            return view('candidates.pages.education', compact('education'));
        }
        return view('candidates.pages.createEducation');
    }
    public function educationStore(Request $request)
    {
        try {

            CandidateEducationDetails::updateOrCreate([
                'user_id' => auth()->user()->id,
                'bechelors' => $request->bechelors,
                'hsc' => $request->hsc,
                'ssc' => $request->ssc,
                'university_name' => $request->university_name,
                'department' => $request->department,
                'hons_passing_year' => $request->hons_passing_year,
                'cgpa' => $request->cgpa,
                'hsc_college_name' => $request->hsc_college_name,
                'hsc_gpa' => $request->hsc_gpa,
                'hsc_passing_year' => $request->hsc_passing_year,
                'hsc_group' => $request->hsc_group,
                'ssc_school_name' => $request->ssc_school_name,
                'ssc_passing_year' => $request->ssc_passing_year,
                'ssc_group' => $request->ssc_group,
                'ssc_gpa' => $request->ssc_gpa,
                'ssc-gpa' => $request->ssc_gpa,


            ]);
            return response()->json(['status' => 'success', 'message' =>  'Education Details created successfully.']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function educationByID(Request $request)
    {
        try {
            $education_id = $request->input('id');
            $user_id = Auth::id();
            $rows = CandidateEducationDetails::where('id', $education_id)
                ->where('user_id', $user_id)
                ->first();
            return response()->json(['status' => 'success', 'education' => $rows]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()], 500);
        }
    }

    function educationUpdate(Request $request)
    {
        try {
            CandidateEducationDetails::where('id', $request->id)->where('user_id', auth()->user()->id)->update([
                'bechelors' => $request->bechelors,
                'hsc' => $request->hsc,
                'ssc' => $request->ssc,
                'university_name' => $request->university_name,
                'department' => $request->department,
                'hons_passing_year' => $request->hons_passing_year,
                'cgpa' => $request->cgpa,
                'hsc_college_name' => $request->hsc_college_name,
                'hsc_gpa' => $request->hsc_gpa,
                'hsc_passing_year' => $request->hsc_passing_year,
                'hsc_group' => $request->hsc_group,
                'ssc_school_name' => $request->ssc_school_name,
                'ssc_passing_year' => $request->ssc_passing_year,
                'ssc_group' => $request->ssc_group,
                'ssc_gpa' => $request->ssc_gpa,

            ]);
            return response()->json(['status' => 'success', 'message' =>  'Education Details updated successfully.']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    function educationDelete(Request $request)
    {
        try {
            CandidateEducationDetails::where('user_id', auth()->user()->id)->where('id', $request->id)->delete();
            return response()->json(['status' => 'success', 'message' =>  'Education  Delete successfully']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

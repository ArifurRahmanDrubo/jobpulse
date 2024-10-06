<?php

namespace App\Http\Controllers;

use App\Models\CandidateEducationDetails;
use App\Models\CandidateExperience;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CandidateProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CandidateProfileController extends Controller
{
    public function CandidateProfilepaaswordChange()
    {

        return view('candidates.pages.candidateProfile');
    }
    public function CandidateProfile()
    {
        $userProfile = CandidateProfile::where('user_id', Auth::id())->first();
        $user = auth()->user();
        $education = CandidateEducationDetails::where('user_id', Auth::id())->first();
        // $exprience = CandidateExperience::where('user_id', Auth::id())->first();
        // dd($education);
        return view('candidates.pages.candidatesProfile', compact('userProfile', 'user', 'education'));
    }

    public function CandidateChangePassword(Request $request)
    {
        try {
            $oldPassword = $request->input('oldPassword');
            $newPassword = $request->input('newPassword');

            $user = User::find(auth()->user()->id);
            if (Hash::check($oldPassword, $user->password)) {
                $user->password = Hash::make($newPassword);
                $user->save();
                return redirect()->back()->with('success', 'Password Changed Successfully');
            } else {
                return redirect()->back()->with('warning', 'Old Password Not Matched');
            }
        } catch (Exception $e) {
            return $e->getMessage();
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
        $candidateProfile = Auth::user()->candidateProfile;
        if ($candidateProfile) {
            $candidateProfile->update([
                'img' => $location,
            ]);
        } else {
            // If no CandidateProfile exists, create a new one
            CandidateProfile::create([
                'user_id' => auth()->id(),
                'img' => $location,
            ]);
        }

        return response()->json(['status' => 'success', 'message' =>  'Profile updated successfully']);
    }
    public function CandidateProfileByID(Request $request)
    {
        try {
            $profile_id = $request->input('id');
            $user_id = Auth::id();
            $rows = CandidateProfile::where('id', $profile_id)
                ->where('user_id', $user_id)
                ->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()], 500);
        }
    }

    public function updateProfile(Request $request)
    {
        try {
            $candidateProfile = Auth::user()->candidateProfile;
            $user_id = Auth::user()->id;

            if ($candidateProfile) {
                $candidateProfile->update([
                    'profession' => $request->profession,
                    'experience' => $request->experience,
                    'hourly_rate' => $request->hourly_rate,
                    'total_projects' => $request->total_projects,
                    'english_level' => $request->english_level,
                    'availability' => $request->availability,
                    'phone' => $request->phone,
                ]);
            } else {
                // If no CandidateProfile exists, create a new one
                CandidateProfile::create([
                    'user_id' => $user_id,
                    'profession' => $request->profession,
                    'experience' => $request->experience,
                    'hourly_rate' => $request->hourly_rate,
                    'total_projects' => $request->total_projects,
                    'english_level' => $request->english_level,
                    'availability' => $request->availability,
                    'phone' => $request->phone,
                ]);
            }
            return response()->json(['status' => 'success', 'message' =>  'Profile updated successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 404);
        }
    }
}

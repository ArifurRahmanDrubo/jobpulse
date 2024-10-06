<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Job;
use App\Models\Home;
use App\Models\User;
use App\Models\Company;
use App\Models\AboutPage;
use App\Models\AdminProfile;
use Illuminate\Http\Request;
use App\Models\CompanyContact;
use App\Models\CandidateProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $totalCompany = User::where('role', 'companies')->count();
            $PendingPostJob = Job::where('status', 'inactive')->count();
            $ActivePostJob = Job::where('status', 'active')->count();
            return view('admin.pages.analysis', compact('totalCompany', 'PendingPostJob', 'ActivePostJob'));
        } else {
            return redirect('/login');
        }
    }
    public function AdminJobs()
    {
        $jobsActive = Job::with('user')->get();

        $jobsInactive = Job::with('user')->where('status', 'inactive')->get();
        // return [$jobsActive, $jobsInactive];
        return view('admin.pages.jobs', compact('jobsActive', 'jobsInactive'));
    }
    public function AdminCompanies()
    {
        $companies = User::where('role', 'companies')->get();
        return view('admin.pages.companies', compact('companies'));
    }

    public function adminCompaniesdelete(Request $request, $id)
    {

        User::where('id', $id)->delete();
        Company::where('user_id', $id)->delete();
        CompanyContact::where('user_id', $id)->delete();
        return redirect()->back()->with('delete', 'Company Deleted Successfully');
    }
    public function CompanyViewByID(Request $request)
    {
        try {
            $companyView = User::where('id', $request->id)->with('Company')->first();
            return response()->json(['status' => 'success', 'companyView' => $companyView]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function adminStatusUpdate(Request $request)
    {
        try {
            // dd($request->all());
            Job::where('user_id', $request->user_id)->where('id', $request->id)->update([
                'status' => $request->status,

            ]);
            $user = User::where('id', $request->user_id)->first();
            $job = Job::where('id', $request->id)->first();
            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'job' => $job->title,
                'status' => $job->status
            ];

            Mail::send(['html' => 'mail.jobStatus'], $data, function ($message) use ($data) {
                $message->to($data['email']);
                $message->subject('Job Status');
            });

            return response()->json(['status' => 'success', 'message' =>  'Job status updated successfully']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function adminjobDelete(Request $request)
    {
        try {
            Job::where('user_id', $request->user_id)->where('id', $request->id)->delete();
            return response()->json(['status' => 'success', 'message' =>  'Job Delete successfully']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function pegesHome()
    {

        $slider = Home::all();
        return view('pages.home', compact('slider'));
    }

    public function aboutPageAdmin()
    {
        $slider = AboutPage::all();
        return view('pages.about', compact('slider'));
    }

    public function storeSlider(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'slider_name' => 'required',
            'slider_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $img = $request->file('slider_image');

        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "slider-{$t}-{$file_name}";
        $img_url = "uploads/home/{$img_name}";

        // Upload File
        $img->move(public_path('uploads/home'), $img_name);
        Home::create([
            'slider_name' => $request->input('slider_name'),
            'slider_image' => $img_url,
        ]);

        return redirect()->back()->with('success', 'Slider Added Successfully');
    }
    public function storeSliderUpdate(Request $request, $id)
    {
        // dd($request->all());
        Home::where('id', $id)->update([
            'status' => $request->input('status'),
        ]);
        return redirect()->back()->with('success', 'Slider Updated Successfully');
    }
    public function updateSliderStatusAbout(Request $request, $id)
    {
        // dd($request->all());
        AboutPage::where('id', $id)->update([
            'status' => $request->input('status'),
        ]);
        return redirect()->back()->with('success', 'Slider Updated Successfully');
    }
    public function deleteSliderStatusAbout(AboutPage $slider)
    {
        // dd($slider);
        File::delete($slider->slider_image);
        $slider->delete();
        return redirect()->back()->with('warning', 'Slider Deleted Successfully');
    }

    public function storeSliderDelete(Request $request)
    {
        // dd($request->all());
        $id = $request->input('id');
        $file_path = $request->input('file_path');
        File::delete($file_path);

        Home::where('id', $id)->delete();
        return redirect()->back()->with('warning', 'Slider Deleted Successfully');
    }

    //about page

    public function aboutSliderStoreEdit(AboutPage $AboutData)
    {
        // dd($request->all());
        //return $AboutData;
        $data = $AboutData;
        //  $data = AboutPage::where('id',$id)->first();
        return view('pages.editAbout', compact('data'));
    }
    public function logout01()
    {
        auth()->logout();
        return redirect('/');
    }
    public function aboutSliderUpdate(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'vision' => 'required',
            'slider_name' => 'required',

        ]);

        if ($request->hasFile('slider_image')) {

            $img = $request->file('slider_image');

            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "slider-{$t}-{$file_name}";
            $img_url = "uploads/{$img_name}";
            //delete old file
            $file_path = $request->input('file_path');
            File::delete($file_path);

            // Upload File
            $img->move(public_path('uploads'), $img_name);
            AboutPage::where('id', $id)->update([
                'vision' => $request->input('vision'),
                'slider_name' => $request->input('slider_name'),
                'slider_image' => $img_url,
            ]);

            return redirect('/aboutPage/admin')->with('success', 'Slider Updated Successfully');
        } else {

            AboutPage::where('id', $id)->update([
                'vision' => $request->input('vision'),
                'slider_name' => $request->input('slider_name'),
            ]);
            return redirect('/aboutPage/admin')->with('success', 'Slider Updated Successfully');
        }
    }


    /// companies change password
    function CompanyAccount()
    {
        return view('companies.pages.acountProfile');
    }
    function CompanyProfile()
    {
        $user = auth()->user();
        $company = Company::where('user_id', Auth::id())->first();
        $CompanyContact = CompanyContact::where('user_id', Auth::id())->first();
        return view('companies.pages.CompanyProfile', compact('user', 'company', 'CompanyContact'));
    }
    function CompanyChangePassword(Request $request)
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

    function CanchangeStatus(Request $request)
    {
        //dd($request->all());
        $job = Job::find($request->job_id);

        $job->status = $request->status;
        $job->save();

        return redirect()->back()->with('success', 'User Status Changed Successfully');
    }
    public function adminProfile()
    {
        $adminProfile = AdminProfile::where('user_id', Auth::id())->first();
        $user = auth()->user();
        //    dd($adminProfile);
        // $exprience = CandidateExperience::where('user_id', Auth::id())->first();
        // dd($education);
        return view('admin.pages.adminProfile', compact('adminProfile', 'user'));
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
        $adminProfile = AdminProfile::where('user_id', auth()->user()->id);
        if ($adminProfile) {
            $adminProfile->update([
                'profile_image' => $location,
            ]);
        } else {
            // If no CandidateProfile exists, create a new one
            AdminProfile::create([
                'user_id' => auth()->id(),
                'img' => $location,
            ]);
        }

        return response()->json(['status' => 'success', 'message' =>  'Profile updated successfully']);
    }
    public function AdminProfileByID(Request $request)
    {
        try {
            $profile_id = $request->input('id');
            $user_id = Auth::id();
            $rows = AdminProfile::where('id', $profile_id)
                ->where('user_id', $user_id)
                ->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()], 500);
        }
    }
    public function updatesProfile(Request $request)
    {
        try {
            $adminProfile = AdminProfile::where('user_id', auth()->user()->id);

            if ($adminProfile) {
                $adminProfile->update([
                    'address' => $request->address,
                    'linkedin' => $request->linkedin,
                    'twitter' => $request->twitter,
                    'facebook' => $request->facebook,
                    'description' => $request->description,
                    'name' => $request->name,
                    'phone' => $request->phone,
                ]);
            } else {
                // If no CandidateProfile exists, create a new one
                AdminProfile::create([
                    'user_id' => auth()->user()->id,
                    'address' => $request->address,
                    'linkedin' => $request->linkedin,
                    'twitter' => $request->twitter,
                    'facebook' => $request->facebook,
                    'description' => $request->description,
                    'name' => $request->name,
                    'phone' => $request->phone,
                ]);
            }
            return response()->json(['status' => 'success', 'message' =>  'Profile updated successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 404);
        }
    }

    public function adminpaaswordChange()
    {

        return view('admin.pages.adminAccount');
    }
    public function AdminChangePassword(Request $request)
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
}

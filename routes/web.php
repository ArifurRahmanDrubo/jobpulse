<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobPageController;
use App\Http\Controllers\HomeViewController;
use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\candidateController;
use App\Http\Controllers\CandidatesController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\CandidateSkillController;
use App\Http\Controllers\CompanyContactController;

use App\Http\Controllers\CandidateSalaryController;
use App\Http\Controllers\CandidateProfileController;
use App\Http\Controllers\CandidateExperienceController;
use App\Http\Controllers\CandidateEducationDetailsController;
use App\Http\Controllers\CandidateProfessionalTrainingController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    switch (auth()->user()->role) {
        case 'admin':
            return redirect('/admin/dashboard');
            // return redirect('/dashboard');

        case 'companies':
            return redirect('/company/dashboard');

        case 'candidates':
            return redirect('/candidates/dashboard');

        default:
            return redirect('/');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/admin/dashboard', [AdminController::class, 'index']);
// Route::get('/companies/dashboard', [ComapaniesController::class, 'index']);
// Route::get('/candidates/dashboard', [CandidatesController::class, 'index']);
Route::get('/', [HomeViewController::class, 'app']);
Route::view('/companyRegister', 'page.Auth.companyRegister');
Route::get('/app', [HomeViewController::class, 'index']);

Route::view('/companyLogin', 'page.Auth.companyLogin');

// candidate pages
Route::view('/candidateRegister', 'page.Auth.candidateRegister');
Route::view('/SentOtp', 'page.Auth.SentOtp');
Route::view('/VerifyOtp', 'page.Auth.VerifyOtp');
Route::view('/ResetPass', 'page.Auth.ResetPassPage');
Route::view('/candidateLogin', 'page.Auth.candidateLogin');
//admin pages
Route::view('/admin', 'page.Auth.admin_login');

Route::post('/sentotp', [UserController::class, 'Sentotp']);
Route::post('/verifyotp', [UserController::class, 'Verifyotp']);
Route::post('/passwordReset', [UserController::class, 'resetpassword'])->middleware('auth:sanctum');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
Route::post('/login', [UserController::class, 'UserLogin'])->name('login');
// Route::view('/login','page.Auth.companyLogin');
Route::post('/company-register', [UserController::class, 'companyRegistration']);
Route::post('/candidateregister', [UserController::class, 'candidateRegistration']);
Route::post('/candidate-login', [UserController::class, 'UserLogin']);

Route::middleware(['auth'])->group(function () {
    Route::get('/profilepage', [CompanyController::class, 'companyProfile']);
    Route::get('/contactpage', [CompanyContactController::class, 'companyContact']);
    Route::get('/company/profile/page', [AdminController::class, 'CompanyProfile']);
    Route::get('/company/account/page', [AdminController::class, 'CompanyAccount']);
    Route::post('/company/change/password', [AdminController::class, 'CompanyChangePassword']);
    Route::post('/company/profile/create', [CompanyController::class, 'profile'])->name('company.profile');
    Route::post('/company/contact/create', [CompanyContactController::class, 'contact'])->name('company.contact');
    Route::post('/company/img/create', [CompanyController::class, 'createImg'])->name('company.image.create');
    Route::get('/jobs', [JobController::class, 'jobs']);
    Route::get('/list-job', [JobController::class, 'jobslist']);

    Route::post('/job-by-id', [JobController::class, 'jobById']);
    Route::post('/job-update', [JobController::class, 'jobUpdate']);
    Route::post('/delete-job', [JobController::class, 'jobDelete']);
    Route::post('/job/store', [JobController::class, 'jobStore'])->name('job.store');

    Route::get('/viewProfile', [JobController::class, 'viewProfile'])->name('viewProfile');
    Route::get('/details/appliedJob', [CompanyController::class, 'appliedJobDetails'])->name('details');
    Route::get('/companies/shortlisted/user', [JobController::class, 'shortlistedUser']);
    Route::post('/applied/job', [CandidateController::class, 'appliedJob'])->name('applied.job');
    Route::get('/list-appliedjob', [CandidateController::class, 'appliedJobList'])->name('listapplied.job.page');
    Route::get('/shortlist-appliedjob', [CandidateController::class, 'appliedJobshortList'])->name('shortlistapplied.job.page');
    Route::get('/appliedJobPage', [CandidateController::class, 'appliedJobPage'])->name('applied.job.page');
    Route::get('/shortlistJobs', [CandidateController::class, 'shortlistJobs']);
    Route::post('/candidate/appliedjob/delete', [CandidateController::class, 'deleteappliedJob']);


    // Route::post('/candidate-update', [UserController::class, 'candidateupdate']);

    Route::get('/candidate/profile/create', [CandidateController::class, 'profile'])->name('candidate.profile');
    Route::get('/candidate/profile/update', [CandidateController::class, 'updateprofile'])->name('candidate.profile.update');
    Route::get('/educationCreatePage', [CandidateEducationDetailsController::class, 'educationCreatePage'])->name('education.create.page');
    Route::post('/candidate/educationStore', [CandidateEducationDetailsController::class, 'educationStore'])->name('education.store');
    Route::post('/candidates/educationById', [CandidateEducationDetailsController::class, 'educationByID'])->name('education.byId');
    Route::post('/candidate/educationUpdate', [CandidateEducationDetailsController::class, 'educationUpdate']);

    Route::get('/job/experience', [CandidateExperienceController::class, 'jobExperience']);
    Route::POST('/candidate/job/experience/create', [CandidateExperienceController::class, 'jobExperienceCreate'])->name('candidate.job.experience');
    Route::get('/candidate/skill/page', [CandidateSkillController::class, 'candidateSkillPage'])->name('skill.page');
    Route::post('/candidate/skill/create', [CandidateSkillController::class, 'Create']);
    Route::post('/candidate/skill/delete', [CandidateSkillController::class, 'deleteSkill']);
    Route::post('/candidate/img/create', [CandidateProfileController::class, 'createImg'])->name('canditate.image.create');
    Route::get('job/traning', [CandidateProfessionalTrainingController::class, 'jobTraning']);
    Route::get('/salaryPage', [CandidateSalaryController::class, 'salaryPage'])->name('salary.page');
    Route::post('/candidate/training/delete', [CandidateProfessionalTrainingController::class, 'trainingDelete']);
    Route::post('/candidate/training/create', [CandidateProfessionalTrainingController::class, 'trainingCreate'])->name('candidate.training.create');
    Route::post('/deleteeducation', [CandidateEducationDetailsController::class, 'educationDelete']);
    Route::post('/deleteJobExprience', [CandidateExperienceController::class, 'exprienceDelete']);
    Route::get('/Candidate/password/change', [CandidateProfileController::class, 'CandidateProfilepaaswordChange']);
    Route::get('/Candidate/profile/page', [CandidateProfileController::class, 'CandidateProfile']);
    Route::post('/candidate/change/password', [CandidateProfileController::class, 'CandidateChangePassword']);
    Route::post('/candidates/ProfileById', [CandidateProfileController::class, 'CandidateProfileByID']);
    Route::post('/candidate-update', [CandidateProfileController::class, 'updateProfile'])->name('canditate.image.create');
    Route::post('/shortlisted/candidate', [JobController::class, 'shortlisted'])->name('shortlist.candidate');
    Route::get('/whoApllied', [JobController::class, 'whoApplied'])->name('who.aplied');
    Route::get('/list-whoappliedjob', [JobController::class, 'whoAppliedjoblist'])->name('who.apliedjoblist');

    Route::get('/details', [CompanyController::class, 'candidateDetails'])->name('details');
    Route::get('/candidate/details', [CandidateController::class, 'candidateDetails'])->name('candidate.details');
    Route::post('/rejected/candidate', [JobController::class, 'rejectlist'])->name('rejecttlist.candidate');
    Route::get('/analytics', [CompanyController::class, 'totalAppliedCount'])->name('totalAppliedCount');
    Route::get('/admin/profile/page', [AdminController::class, 'adminProfile']);
    Route::post('/admin/img/create', [AdminController::class, 'createImg'])->name('admin.image.create');
    Route::post('/admin/ProfileById', [AdminController::class, 'AdminProfileByID']);
    Route::post('/admin-update', [AdminController::class, 'updatesProfile'])->name('admin.profile.create');
    Route::get('/admin/password/change', [AdminController::class, 'adminpaaswordChange']);
    Route::post('/admin/change/password', [AdminController::class, 'AdminChangePassword']);

    Route::get('/clear', function () {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        Artisan::call('route:clear');
        Artisan::call('optimize:clear');

        Route::post('/about/slider/store', [AboutPageController::class, 'aboutSliderStore']);
        Route::get('/store/slider/edit/{AboutData}', [AdminController::class, 'aboutSliderStoreEdit']);
        Route::post('/aboutSliderUpdate/{id}', [AdminController::class, 'aboutSliderUpdate']);

        Route::post('/store/slider/about/update/{id}', [AdminController::class, 'storeSliderUpdateabout']);
        Route::post('/status/update/about/{slider}', [AdminController::class, 'updateSliderStatusAbout']);
        Route::post('/delete/slider/about/{slider}', [AdminController::class, 'deleteSliderStatusAbout']);
        Route::post('/store/slider', [AdminController::class, 'storeSlider']);
        Route::post('/store/slider/update/{id}', [AdminController::class, 'storeSliderUpdate']);
        Route::post('/store/slider/delete', [AdminController::class, 'storeSliderDelete']);

        Route::post('/admin/companies/delete/{id}', [AdminController::class, 'Companiesdelete']);
    });


    Route::post('/admin/change/job/status', [AdminController::class, 'adminChangeJobStatus']);
    Route::post('/admin/jobs/delete/{id}', [AdminController::class, 'jobDelete']);
    Route::get('/candidateAppliedCount', [CandidateController::class, 'totalAppliedCount']);
    //ajax get Route
    Route::get('/admin/can/change/status', [AdminController::class, 'CanchangeStatus'])->name('change.status');
    Route::post('/admin/img/create', [AdminController::class, 'createImg'])->name('admin.image.create');
    Route::get('/admin/jobs', [AdminController::class, 'AdminJobs']);





    Route::get('/Pages', [AdminController::class, 'pegesHome']);

    Route::get('/contact/mail', [ContactPageController::class, 'contactMail'])->name('contact.mail');
    Route::get('/aboutPage/admin', [AdminController::class, 'aboutPageAdmin']);
    Route::get('/totalAppliedCount', [CandidateController::class, 'totalAppliedCount']);
});
//Home job details page
Route::get('/jobdetailsPage', [JobPageController::class, 'jobdetailsPage']);


//Job Page
Route::get('/allJobs', [JobPageController::class, 'allJobs']);
Route::get('/searchJob', [JobPageController::class, 'searchJob']);
//candidate applied jobs





Route::get('/sliderPage', [HomeViewController::class, 'sliderPage']);
//fontend


Route::get('/jobs/filter/type', [JobPageController::class, 'filterType']);
Route::get('/jobs/filter/location', [JobPageController::class, 'filterLocation']);
Route::get('/jobs/filter/experience', [JobPageController::class, 'filterExperience']);

//home page filter
Route::get('/jobs/filter/location/title', [JobPageController::class, 'filterLocationTittle']);
Route::get('/jobs/filter/relevance/old', [JobPageController::class, 'filterRelevanceOld']);
Route::get('/jobs/filter/category/type', [JobPageController::class, 'filterCategoryType']);
Route::get('/jobs/filter/category/type/get', [JobPageController::class, 'filterCategoryTypeGet'])->name('filterCategoryTypeGet');

Route::get('/JobsDetails', [JobPageController::class, 'JobsDetails'])->name('JobsDetails');
Route::get('/findJobs', [JobPageController::class, 'findJobs']);

Route::get('/about', [AboutPageController::class, 'aboutPage']);
//contact
Route::get('/contact', [ContactPageController::class, 'contact']);

// Route::view('/','page.home.home');
// Route::view('/login','pages.home.login');
// Route::view('/Register','page.home.Register');
// company api


Route::post('/company-update', [CompanyController::class, 'updateCompanyProfile'])->middleware('auth:sanctum');
Route::post("/company-by-id", [CompanyController::class, 'CompanyByID'])->middleware('auth:sanctum');
Route::post("/companyContact-by-id", [CompanyContactController::class, 'CompanyContactByID'])->middleware('auth:sanctum');
Route::post('/companyContact-update', [CompanyContactController::class, 'updateCompanyContact'])->middleware('auth:sanctum');





// candidate api


Route::get('/candidates/dashboard', [CandidatesController::class, 'index'])->middleware('auth:sanctum');
Route::get('/company/dashboard', [CompanyController::class, 'index'])->middleware('auth:sanctum');
Route::get('/shortlistJobs', [CandidateController::class, 'shortlistJobs'])->middleware('auth:sanctum')->name('shortlistJobs');


//admin api

//company pages

//  Route::view('/candidates_dashboard','candidates.dashboard')->middleware('auth:sanctum');
//  Route::view('/company/dashboard','companies.dashboard')->middleware('auth:sanctum');
//  Route::view('/admin_dashboard','admin.dashboard')->middleware('auth:sanctum');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware('auth:sanctum');
Route::get('/admin/companies', [AdminController::class, 'AdminCompanies'])->middleware('auth:sanctum');
Route::get('/admin/jobs', [AdminController::class, 'AdminJobs'])->middleware('auth:sanctum');
Route::post('/adminjobStatusupdate', [AdminController::class, 'adminStatusUpdate'])->middleware('auth:sanctum');
Route::post('/deleteadmin-job', [AdminController::class, 'adminjobDelete'])->middleware('auth:sanctum');
Route::post('/adminCompanyDelete', [AdminController::class, 'adminCompaniesdelete'])->middleware('auth:sanctum');
Route::post("/companyView-by-id", [AdminController::class, 'CompanyViewByID'])->middleware('auth:sanctum');



//admin routes


/// super admin login
Route::view('/jobPulse', 'admin.pages.login');
///view here

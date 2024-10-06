
@extends('companies.dashboard')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User Profile</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
   
    <style>
        body {
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        }
        .emp-profile {
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }
        .profile-img {
            text-align: center;
        }
        .profile-img img {
            width: 70%;
            height: 100%;
        }
        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }
        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }
        .profile-head h5 {
            color: #333;
        }
        .profile-head h6 {
            color: #0062cc;
        }
        .profile-edit-btn {
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }
        .proile-rating {
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }
        .proile-rating span {
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }
        .profile-head .nav-tabs {
            margin-bottom: 5%;
        }
        .profile-head .nav-tabs .nav-link {
            font-weight: 600;
            border: none;
        }
        .profile-head .nav-tabs .nav-link.active {
            border: none;
            border-bottom: 2px solid #0062cc;
        }
        .profile-work {
            padding: 14%;
            margin-top: -15%;
        }
        .profile-work p {
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }
        .profile-work a {
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }
        .profile-work ul {
            list-style: none;
        }
        .profile-tab label {
            font-weight: 600;
        }
        .profile-tab p {
            font-weight: 600;
            color: #0062cc;
        }
        .updatebtn{
            border: none;
            border-radius: 1.5rem;
            width: 60%;
            padding: 2%;
            font-weight: 600;
            text-color: #6c757d;
            box-shadow: #0d5ba8;
        }
        .profilebtn{
            border: none;
            border-radius: 1.2rem;
            width: 50%;
            padding: 2%;
            font-weight: 600;
            text-color: #6c757d;
            box-shadow: #c8b3c9;
        }
    </style>
</head>
<body>
    <div class="container emp-profile">
        <form enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="profile-img">
                        <img id="previewImage" src="{{ asset($userProfile->img) }}" alt=""/>    
                    </div>
                    
                </div>
                
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5 class="text-uppercase">{{ $details->name }}</h5>
                        <h3 class="title mb-3">{{ $userProfile->profession }}</h3>
                        <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="education-tab" data-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="false">Educations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="experience-tab" data-toggle="tab" href="#experience" role="tab" aria-controls="experience" aria-selected="false">Experience</a>
                            </li>
                          
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex justify-content-between align-items-center">
                       
                        <div class="d-flex justify-content-end">
                            <input type="hidden" name="job_id" id="job_id" value="{{ $currentJob->job_id }}">
                            <input type="hidden" name="user_id" id="user_id" value="{{ $currentJob->user_id }}">
                            @if($currentJob->status == 'selected')
                                <button type="button" class="btn btn-end editBtn btn-primary" disabled>Selected</button>
                            @else
                                <button type="button" onclick="select()" class="btn btn-end editBtn btn-primary" data-id="" value="Select">Select</button>
                            @endif
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>WORK LINK</p>
                        <a href="">Website Link</a><br/>
                        <a href="">Bootsnipp Profile</a><br/>
                        <a href="">Bootply Profile</a>
                        <p>SKILLS</p>
                        <a href="">Web Designer</a><br/>
                        <a href="">Web Developer</a><br/>
                        <a href="">WordPress</a><br/>
                        <a href="">WooCommerce</a><br/>
                        <a href="">PHP, .Net</a><br/>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $details->id }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $details->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $details->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $userProfile->phone }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Profession</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $userProfile->profession }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Experience</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $userProfile->experience }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Hourly Rate</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $userProfile->hourly_rate }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Total Projects</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $userProfile->total_projects }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Current Salary</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $salary->current_salary }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Expected Salary</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $salary->excepted_salary}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>English Level</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $userProfile->english_level }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Availability</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $userProfile->availability }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Becholors</label>
                                </div>
                                <div class="col-md-6">
                                    
                                    <p>{{ $details->education[0]->bechelors }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>University Name</label>
                                </div>
                                <div class="col-md-6">
                                    
                                    <p>{{ $details->education[0]->university_name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Department Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $details->education[0]->department }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Hon's Passing Year</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $details->education[0]->hons_passing_year }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>CGPA</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $details->education[0]->cgpa }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>HSC</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $details->education[0]->hsc }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>HSC College Name</label>
                                </div>
                                <div class="col-md-6">
                                   
                                    <p> {{ $details->education[0]->hsc_college_name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>HSC Group</label>
                                </div>
                                <div class="col-md-6">
                                    
                                    <p>{{ $details->education[0]->hsc_group}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>HSC Passing year</label>
                                </div>
                                <div class="col-md-6">
                                    
                                    <p>{{ $details->education[0]->hsc_passing_year}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>HSC GPA</label>
                                </div>
                                <div class="col-md-6">
                                    
                                    <p>{{ $details->education[0]->hsc_gpa}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                            @foreach ($experience as $exp)
                            <article class="resume-timeline-item position-relative pb-5">

                                <div class="resume-timeline-item-header mb-2">
                                    <div class="d-flex flex-column flex-md-row">
                                        <h4 class="resume-position-title  mb-1">
                                            {{ $exp->dasignation }}</h4>
                                        <div class="resume-company-name ms-auto">{{ $exp->company_name }}</div>
                                    </div><!--//row-->
                                    <div class="resume-position-time">2023 - Present</div>
                                </div><!--//resume-timeline-item-header-->
                                <div class="resume-timeline-item-desc">
                                    <h4 class="resume-timeline-item-desc-heading font-weight-bold">
                                        Technologies used:</h4>
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><span
                                                class="badge bg-secondary badge-pill">Angular</span></li>
                                        <li class="list-inline-item"><span
                                                class="badge bg-secondary badge-pill">Python</span></li>
                                        <li class="list-inline-item"><span
                                                class="badge bg-secondary badge-pill">jQuery</span></li>
                                        <li class="list-inline-item"><span
                                                class="badge bg-secondary badge-pill">Webpack</span></li>
                                        <li class="list-inline-item"><span
                                                class="badge bg-secondary badge-pill">HTML/SASS</span></li>
                                        <li class="list-inline-item"><span
                                                class="badge bg-secondary badge-pill">PostgresSQL</span>
                                        </li>
                                    </ul>
                                </div><!--//resume-timeline-item-desc-->

                            </article><!--//resume-timeline-item-->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </form>           
    </div>
    @include('candidates.component.createProfile')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

      <script>
            async function select(id) {
              try {
                let user_id = document.getElementById("user_id").value;
                let job_id = document.getElementById("job_id").value;
                let status = "selected";
                
                console.log("hello status id");
                console.log(user_id);
                console.log(job_id);
                showLoader();
                let res = await axios.post("/shortlisted/candidate", { job_id: job_id, user_id: user_id, status: status }, HeaderToken());
                hideLoader();
                if (res.data['status'] === "success") {
                  successToast(res.data['message']);
                  window.location.href ="/whoApllied";
                } else {
                  errorToast(res.data['message']);
                }
              } catch (error) {
                console.log(error);
              }
            }
            
            </script>
</body>
</html>
@endsection
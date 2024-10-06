@extends('candidates.dashboard')
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
                <div class="col-md-5">
                    <div class="profile-img">
                        <img id="previewImage" src="{{ asset($company->img) }}" alt=""/>
                        <div class="file btn btn-lg rounded-sm btn-primary">
                            Change Photo
                            <input type="file" id="imgInput" name="img" accept="image/*"/>
                        </div>
                    </div>
                    <div class="mr-5 d-flex justify-content-end">
                        <button type="button" onclick="storeImage()" class="btn updatebtn" name="btnAddMore">Update Photo</button>
                        {{-- <button type="button" onclick="storeImage()" class="btn updatebtn" name="btnAddMore">Update Photo</button> --}}
                    </div>
                </div>
                
                <div class="col-md-7">
                    <div class="profile-head">
                        <h5>{{ $user->name }}</h5>
                        <h6>{{ $company->type }}</h6>
                        <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-md-3">
                    <input type="hidden" name="id" id="updateProfileid" value="{{ $company->id }}">
                    <button type="button" onclick="updatebyID({{ $company->id }})" data-bs-toggle="modal" data-bs-target="#createProfile-modal" class="float-end profilebtn m-0 btn">Edit Profile</button>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-md-5">
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
                <div class="col-md-7">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->id }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $CompanyContact->phone }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Website</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $company->website }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Year_of_establishment	</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $company->year_of_establishment	 }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Description</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $company->description }}</p>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Licence</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $company->license }}</p>
                                </div>
                            </div>
                            
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
        $(document).ready(function(){
            $('#myTab a').on('click', function (e) {
                e.preventDefault();
                $(this).tab('show');
            });
    
            $('#imgInput').on('change', function(e){
                e.preventDefault();
                var reader = new FileReader();
                reader.onload = function (e) {
                    // Display the selected image temporarily
                    $('#previewImage').attr('src', e.target.result);
                    // Store the selected image data temporarily
                    $('#previewImage').data('tempImg', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });

        // function profileImageUpload()
        // {
        //     var formData = new FormData();
        //     var file  = $('#imgInput')[0].files[0];
        //     formData.append('image', file);
        //     $.ajax({
        //         type: "POST",
        //         url: "{{ route('canditate.image.create') }}",
        //         data: formData,
        //         processData:false,
        //         contentType:false,
        //         headers:{
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         success: function (response) {
        //             console.log(response);
        //         },
        //         error: function(error){
        //             console.log(error);
        //         }
        //     });
        // }

    
    async function storeImage() {
        try {
            console.log('Store image function called');

            // Get the input element
            let input = document.getElementById('imgInput');

            // Check if any file is selected
            if (input.files && input.files[0]) {
                // Get the first file selected by the user
                let file = input.files[0];
                
                // Create a FormData object to send the file
                let formData = new FormData();
                formData.append('img', file);
            console.log(formData);
                showLoader();

                // Send the FormData object containing the file to the backend
                let res = await axios.post("/company/img/create", formData, HeaderToken());

                hideLoader();
                console.log(res);

                if (res.data['status'] === "success") {
                    successToast(res.data['message']);
                    window.location.href = "/company/profile/page";
                } else {
                    errorToast(res.data['message']);
                }
            } else {
                // Handle case when no file is selected
                errorToast('No image selected.');
            }
        } catch (e) {
            unauthorized(e.response.status);
        }
    }




    </script>
</body>
</html>
@endsection
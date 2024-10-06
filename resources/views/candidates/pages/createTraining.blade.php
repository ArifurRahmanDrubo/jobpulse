@extends('candidates.dashboard')
@section('content')
<div class="col-12 grid-margin">
    <div class="card">
        
        
        <div class="card-body">
            @if (Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
            <h4 class="card-title">Personal Training</h4>
            <form class="form-sample" id="save-form" >
                @csrf
                <p class="card-description">
                    Personal info
                </p>
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class=" col-form-label">Course Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="course_name" class="form-control" placeholder="Course Name" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label class=" col-form-label">Institute Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="institute_name" id="institute_name" class="form-control" placeholder="Institute Name" />
                            </div>
                        </div>
 
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class=" col-form-label">Completation Year</label>
                        <div class="col-sm-9">
                            <input type="text" name="completion_year" id="completion_year" class="form-control" placeholder="Completion Year" />
                        </div>
                    </div>
                </div>

                <button type="save" onclick="saveTraining()" class="btn btn-primary mr-2">Submit</button>
            </form>
        </div>
    </div>
</div>



<script>
async function saveTraining(){
    try{
        let coure_name =document.getElementById('course_name').value;
        let institute_name =document.getElementById('institute_name').value;
        let completion_year =document.getElementById('completion_year').value;
showLoader();
let res = await axios.post("/candidate/training/create",{ name:coure_name,institute_name:institute_name,completion_year:completion_year},HeaderToken());
hideLoader();
console.log(res);
if(res.data['status']==="success"){
 successToast(res.data['message']);
    document.getElementById("save-form").reset();
  window.location.href ="/job/traning";
   } else {
          errorToast(res.data['message'])
    }              

    }catch (e) {
            unauthorized(e.response.status)
        }

}


</script>
@endsection
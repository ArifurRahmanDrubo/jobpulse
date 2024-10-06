
@extends('candidates.dashboard')
@section('content')


<div class="col-lg-12 mt-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Candidates Skill</h4>
            
            <div class="table-responsive">
                <table class="table " id="myTable">
                    <thead>
                        <tr>
                            <th>Skills</th>
                            <th>Action</th>
                        </tr>
                    </thead>
              
                        <tbody>
                            @foreach ($skills as $skill)
                            <tr>
                                <td>{{$skill->skill  }}</td>
                                <td class="d-flex">
                                    <button onclick="deletebtn(this)" id="deletebtn" data-bs-toggle="modal" data-bs-target="#deleteSkill-modal"  class="btn deleteBtn btn-danger " data-id="{{ $skill->id }}"  >Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                  
                </table>
<div class="col-12 grid-margin">
    <div class="card">
        
        
        <div class="card-body">
            @if (Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
            <h4 class="card-title">Personal  Skill</h4>
            <form class="form-sample" id="save-form">
                @csrf
                <p class="card-description">
                    Skill info
                </p>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class=" col-form-label">Skills</label>
                            <div class="col-sm-9">
                                <input type="text" name="skill" id="skill" class="form-control" placeholder="Add skill" />
                            </div>
                        </div>
                    </div>
                    
                    <button type="save" onclick="saveSkill()" class="btn btn-primary mr-2">Submit</button>
                </div>

             
                
            </form>
        </div>
    </div>
</div>

@include('candidates.component.deleteSkill')








               
<script>
async function saveSkill(){
    try{
        let skill =document.getElementById('skill').value;
showLoader();
let res = await axios.post("/candidate/skill/create",{ skill: skill},HeaderToken());
hideLoader();
console.log(res);
if(res.data['status']==="success"){
 successToast(res.data['message']);
    document.getElementById("save-form").reset();
  window.location.href ="/candidate/skill/page";
   } else {
          errorToast(res.data['message'])
    }              

    }catch (e) {
            unauthorized(e.response.status)
        }

}
</script>

@endsection
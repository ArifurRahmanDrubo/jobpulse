@extends('candidates.dashboard')
@section('content')


<div class="col-lg-12 mt-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Exprience</h4>
            
            <div class="table-responsive">
                <table class="table " id="myTable">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Dasignation</th>
                            <th>Joining Date</th>
                            <th>Depature Time</th>
                            <th>Action</th>
                           
                            
                        </tr>
                    </thead>
              
                        <tbody>
                    @foreach ($experience as $experience )
    

                            <tr>
                                <td>{{$experience->company_name  }}</td>
                                <td>{{ $experience->dasignation }}</td>
                               <td>{{ \Carbon\Carbon::parse($experience->joining_date)->format('d F Y') }}</td>
                               <td>{{ \Carbon\Carbon::parse($experience->departure_time)->format('d F Y') }}</td>
                                <td class="d-flex">
                                    
                                    <button onclick="deletebtn(this)" id="deletebtn" data-bs-toggle="modal" data-bs-target="#deleteExprience-modal"  class="btn deleteBtn btn-danger " data-id="{{ $experience->id }}"  >Delete</button>
                                   
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
            <h4 class="card-title">Personal Experience</h4>
            <form class="form-sample" id="save-form">
                @csrf
                <p class="card-description">
                    Personal info
                </p>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class=" col-form-label">Company Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-form-label" >Dasignation</label>
                            <div class="col-sm-9">
                                <input type="text" name="dasignation" id="designation" class="form-control" placeholder="Designation" />
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class=" col-form-label">Joining Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="joining_date" id="joining_date" class="form-control" placeholder="Joining Date" />
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class=" col-form-label">Depature Time</label>
                            <div class="col-sm-9">
                                <input type="date" name="depature_time" id="departure_time" class="form-control" placeholder="Departure Date" />
                            </div>
                        </div>
                    </div>
                </div>
               
                <button type="save" onclick="saveExprience()" class="btn btn-primary mr-2">Submit</button>
            </form>
        </div>
    </div>
</div>

@include('candidates.component.deleteExprience')








<script>
async function saveExprience(){
    try{let company_name =document.getElementById('company_name').value;
let designation =document.getElementById('designation').value;
let departure_time =document.getElementById('departure_time').value;
let joining_date =document.getElementById('joining_date').value;

showLoader();
let res = await axios.post("/candidate/job/experience/create",{
    company_name: company_name,
    dasignation: designation,
    joining_date: joining_date,
    depature_time: departure_time
},HeaderToken());
hideLoader();
console.log(res);
if(res.data['status']==="success"){
 successToast(res.data['message']);
    document.getElementById("save-form").reset();
  window.location.href ="/job/experience";
   } else {
          errorToast(res.data['message'])
    }              

    }catch (e) {
            unauthorized(e.response.status)
        }

}
</script>

@endsection
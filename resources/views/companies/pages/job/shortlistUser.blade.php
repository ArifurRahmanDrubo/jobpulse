@extends('companies.dashboard')
@section('content')


<div class="col-lg-12 mt-4 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">All Jobs</h4>
      <p class="card-description">
      <a class="btn btn-primary" href=" {{ url('/jobsCreatePage') }}" >Add Job</a>
      </p>
      <div class="table-responsive">
        <table class="table " id="myTable">
          <thead>
            <tr>
              <th>Job Tittle</th>
              <th>Applicant Name</th>
              <th>Action</th>
              <th>ShortListed</th>
              
              
            </tr>
          </thead>
         @foreach ($jobs as $job)
         <tbody>
            
            <tr>
              <td>{{ $job->job->title }}</td>
              <td>{{ $job->user->name }}</td>
             
             <td><a class="btn btn-primary" href=" {{ route('details',['user_id'=>$job->user->id,'job_id'=>$job->job->id]) }}" >View</a></td>
             {{-- <td><a class="btn btn-primary" href=" {{ route('viewProfile',['user_id'=>$job->user->id]) }}" >View</a></td> --}}
              <td>
                <input type="hidden" name="job_id" id="job_id" value="{{ $job->job->id }}">
                <input type="hidden" name="user_id" id="user_id" >
                <button type="button" onclick="reject({{ $job->user->id }})" class="btn editBtn btn-primary" data-id="{{ $job->user->id }}" value="rejected">Reject</button>
              </td>

             
             
                
             

            </tr>
           
          </tbody>
         @endforeach
        </table>
      </div>
    </div>
  </div>
</div>


          
<script>
  async function reject(id) {
    try {
      document.getElementById("user_id").value = id; // Corrected line
      
      let user_id = document.getElementById("user_id").value;
      let job_id = document.getElementById("job_id").value;
      let status = "rejected";
      
      console.log("hello status id");
      console.log(user_id);
      console.log(job_id);
      showLoader();
      
      let res = await axios.post("/rejected/candidate", { job_id: job_id, user_id: user_id, status: status }, HeaderToken());
      
      hideLoader();
      
      console.log(res);
      
      if (res.data['status'] === "success") {
        successToast(res.data['message']);
        window.location.href ="/companies/shortlisted/user";
      } else {
        errorToast(res.data['message']);
      }
    } catch (error) {
      console.log(error);
    }
  }
  
  </script>
 @endsection
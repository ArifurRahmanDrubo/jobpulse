@extends('companies.dashboard')
@section('content')

<div class="col-lg-12 mt-4 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">All Jobs</h4>
      <p class="card-description">
        <a class="btn btn-primary" href="{{ url('/jobs') }}">Add More Jobs</a>
      </p>
      <div class="table-responsive">
        <table class="table" id="myTable">
          <thead>
            <tr>
              <th>Job Title</th>
              <th>Applicant Name</th>
              <th>Applied Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($jobs as $job)
              <tr>
                <td>{{ $job->job->title }}</td>
                <td>{{ $job->user->name }}</td>
                <td>{{ $job->created_at->format('j F Y') }}</td>
                <td>
                  <a class="btn btn-primary" href="{{ route('details',['user_id'=>$job->user->id,'job_id'=>$job->job->id]) }}">View</a>
                </td>
                <td>
                    <input type="hidden" name="job_id" id="job_id" value="{{ $job->job->id }}">
                    <input type="hidden" name="user_id" id="user_id" >
                    <button type="button" onclick="reject({{ $job->user->id }})" class="btn editBtn btn-primary" data-id="{{ $job->user->id }}" value="rejected">Reject</button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div> 
<script>
// Call the function to populate the table

async function reject(userId) {
    try {
        let job_id = $("input[name='job_id']").val();
        let status = "rejected";
        
        showLoader();
        
        let res = await axios.post("/rejected/candidate", { job_id: job_id, user_id: userId, status: status }, HeaderToken());
        
        hideLoader();
        
        if (res.data['status'] === "success") {
            successToast(res.data['message']);
            window.location.href = "/whoApllied";
        } else {
            errorToast(res.data['message']);
        }
    } catch (error) {
        console.log(error);
    }
}
</script>

@endsection






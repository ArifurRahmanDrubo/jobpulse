
@extends('candidates.dashboard')
@section('content')
<div class="col-lg-12 mt-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="job_header d-flex align-items-center justify-content-between">
                <h4 class="card-title">All Applied Jobs</h4>
                <p class="card-description">
                    <a class="btn btn-primary" href="{{ url('/findJobs') }}">Apply</a>
                </p>
            </div>

            <div class="table-responsive">
                <table class="table" id="tableData">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Company Name</th>
                            <th>Location</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="tableList">

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

@include('candidates.component.deleteAppliedjob')
<script>
    getList(); // Corrected function name

    async function getList() {
        try {
            showLoader();
            let res = await axios.get("/list-appliedjob", HeaderToken());
            hideLoader();

            let tableList = $("#tableList");
            let tableData = $("#tableData");

            tableData.DataTable().destroy();
            tableList.empty();

            res.data['jobs'].forEach(function (job, index) {
                console.log(job);
                let jobRow = `<tr>
                                <td>${job.job.title}</td>
                                <td>${job.company.name}</td>
                                <td>${job.job.location}</td>
                                <td class="text-success">${job.job.salary}</td>
                                <td>
                                  <button onclick="deletebtn(this)" id="deletebtn" data-bs-toggle="modal" data-bs-target="#deleteAppliedJob-modal"  class="btn deleteBtn btn-danger " data-id="${ job.job.id }"  >Delete</button>
                                </td>
                             </tr>`;
                tableList.append(jobRow);
            });

            new DataTable('#tableData', {
                order: [
                    [0, 'desc']
                ],
                lengthMenu: [3, 5, 10,]
            });
        } catch (e) {
            unauthorized(e.response.status);
        }
    }
</script>

@endsection 


{{-- 
@extends('candidates.dashboard')
@section('content')

 <div class="col-lg-12 mt-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="job_header d-flex align-items-center justify-content-between"><h4 class="card-title">All Apllied Jobs</h4>
                        <p class="card-description">
                        <a class="btn btn-primary" href=" {{ url('/findJobs') }}" >Apply</a>
                        </p></div>
                  
                  <div class="table-responsive">
                    <table class="table ">
                      <thead>
                        <tr>
                          <th>Job Tittle</th>
                          <th>Company Name</th>
                          <th>Location</th>
                          <th>Selary</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                     @foreach ($jobs as $job)
                     <tbody>
                        <tr>
                          <td>{{ $job->job->title }}</td>
                          <td>{{ $job->company->name }}</td>
                          <td>{{ $job->job->location }}</td>
                          <td class="text-success"> {{$job->job->salary }}</td>
                           <td>
                            <form action="{{ url('/job/delete/'.$job->job->id) }}" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="{{ $job->job->id}}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                           
                            </td> 

                        </tr>
                       
                      </tbody>
                     @endforeach
                    </table> 
                  </div>
                </div>
              </div>
            </div>
@endsection  --}}
 
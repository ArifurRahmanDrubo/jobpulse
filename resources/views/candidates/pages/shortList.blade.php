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
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Job Tittle</th>
                          <th>Company Name</th>
                          <th>Location</th>
                          <th>Selary</th>
                          <th>Selected Shortlist</th>
                        </tr>
                      </thead>
                     @foreach ($jobs as $job)
                     <tbody>
                        <tr>
                          <td>{{ $job->job->title }}</td>
                          <td>{{ $job->company->name }}</td>
                          <td>{{ $job->job->location }}</td>
                          <td class="text-success"> {{$job->job->salary }}</td>

                      <td>  <label class="badge badge-success">{{ $job->status=='selected'? 'Selected' : 'No' }}</label></td>  
                        </tr>       
                      </tbody>
                     @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div> 

            <script>
              getList(); // Corrected function name
          
              async function getList() {
                  try {
                      showLoader();
                      let res = await axios.get("/shortlist-appliedjob", HeaderToken());
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
                                            <label class="badge badge-success">{{ $job->status=='selected'? 'Selected' : 'No' }}</label>
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
@endsection --}}

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
                    <table class="table" id="tableData">
                      <thead>
                        <tr>
                          <th>Job Tittle</th>
                          <th>Company Name</th>
                          <th>Location</th>
                          <th>Selary</th>
                          <th>Selected Shortlist</th>
                        </tr>
                      </thead>
                    
                     <tbody id="tableList">
                             
                      </tbody>
                
                    </table>
                  </div>
                </div>
              </div>
            </div> 

            <script>
              getList(); // Corrected function name
          
              async function getList() {
                  try {
                      showLoader();
                      let res = await axios.get("/shortlist-appliedjob", HeaderToken());
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
                                            <label class="badge badge-success"> ${job.status=='selected'? 'Selected' : 'No' }</label>
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
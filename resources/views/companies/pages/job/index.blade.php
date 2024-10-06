@extends('companies.dashboard')
@section('content')
    <div class="col-lg-12 mt-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Jobs</h4>
                <p class="card-description">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 mb-3 bg-gradient-primary">Add job</button>
                    {{-- <a class="btn btn-primary" href=" {{ url('/jobsCreatePage') }}">Add Job</a> --}}
                </p>
                <div class="table-responsive">
                    <table class="table " id="tableData">
                        <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Employment Status</th>
                                <th>Location</th>
                                <th>Salary</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tableList">
                            <!-- Table content will be dynamically added here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('companies.pages.job.createjob')
    @include('companies.pages.job.editjob')
    @include('companies.pages.job.deletejob')

    <script>
        getList();

        async function getList() {
            try {
                showLoader();
                let res = await axios.get("/list-job", HeaderToken());
                hideLoader();
    
                let tableList = $("#tableList");
                let tableData = $("#tableData");
    
                tableData.DataTable().destroy();
                tableList.empty();
    
                res.data['jobs'].forEach(function (job, index) {
                    let jobRow = `<tr>
                                    <td>${job.title}</td>
                                    <td>${job.employment_status}</td>
                                    <td>${job.location}</td>
                                    <td class="text-success">${job.salary}</td>
                                    <td><label class="badge badge-warning">${job.status}</label></td>
                                    <td>
                                        <button onclick="editbtn(this)" id="editbtn" data-bs-toggle="modal" data-bs-target="#updatejob-modal"  class="btn editBtn btn-primary edit-btn" data-id="${job.id}">Edit</button>
                                    </td>
                                    <td>
                                        <button onclick="deletebtn(this)" id="deletebtn" data-bs-toggle="modal" data-bs-target="#deletejob-modal"  class="btn deleteBtn btn-danger " data-id="${job.id}">Delete</button>
                                    </td>
                                </tr>`;
                    tableList.append(jobRow);
                });
    
                new DataTable('#tableData', {
                    order: [
                        [0, 'desc']
                    ],
                    lengthMenu: [3, 5, 10]
                });
            } catch (e) {
                unauthorized(e.response.status);
            }
        }
    </script>
@endsection

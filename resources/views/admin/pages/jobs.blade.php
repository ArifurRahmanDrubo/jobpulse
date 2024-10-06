{{-- 
@extends('admin.dashboard')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h4 class="card-title text-dark text-center mt-3">Jobs</h4>
      <table class="table" id="myTable">
        <thead class="thead-dark">
          <tr>
            <th scope="col">S/N</th>
            <th scope="col">Job</th>
            <th scope="col">Company</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
    
        <tbody>
          @foreach ($jobsActive as $job)
          <tr>
            <td scope="row">{{ $loop->iteration }}</td>
            <td>{{ $job->title }}</td>
            <td>{{ $job->user->name }}</td>
            <td>
              <label id="status-label-{{ $job->id }}" class="badge badge-{{ $job->status == 'active' ? 'success' : 'warning' }}">
                {{ $job->status == 'active' ? 'Active' : 'Inactive' }}
              </label>
            </td>
            <td>
              <div class="row">
                <div class="col-md-3">
                  <select id="status-select" class="custom-select">
                    <option value="active" {{ $job->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $job->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                  </select>
                </div>
                <div class="col-md-6">
                    <input type="" name="id" id="job_id" value="{{ $job->id }}">
                    <input type="" name="user_id" id="user_id" value="{{ $job->user->id }}">
                    <button onclick="updateStatus(this)" class="btn btn-warning edit-btn" data-id="{{ $job->id }}" data-userID="{{ $job->user->id  }}">Update</button>
                    <button  id="deleteadminjobbtn" onclick="deletebtn(this)" data-bs-toggle="modal" data-bs-target="#deleteadminjob-modal"  class="btn deleteBtn btn-danger " data-id="{{ $job->id }}"  >Delete</button>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@include('admin.pages.deleteadminjob')
<script>
  async function updateStatus(button) {
      try { 
          let job_id = button.getAttribute('data-id');
          let userId = button.getAttribute('data-userID');
          let status = document.getElementById('status-select').value;
          console.log(job_id);
            console.log(user_id);
            console.log(status);
          showLoader();
          let res = await axios.post("/adminjobStatusupdate", { id: job_id, user_id: userId, status: status }, HeaderToken());
          hideLoader();
          
          if (res.data.status === "success") {
              successToast(res.data.message);
              window.location.href = "/admin/jobs";
          } else {
              errorToast(res.data.message);
          }
      } catch (error) {
        console.log(error);
      }
  }
</script>

<script>
 async function updateStatus(button) {
   try{ 
         let job_id = button.getAttribute('data-id');
         document.getElementById('job_id').value=job_id;
         let userId = button.getAttribute('data-userID');
         document.getElementById('user_id').value=userId;



           let id = document.getElementById('job_id').value;
            let user_id = document.getElementById('user_id').value;
            let status = document.getElementById('status-select').value;
            console.log(id);
            console.log(user_id);
            console.log(status);

            showLoader();
            let res = await axios.post("/adminjobStatusupdate",{id:id,user_id:user_id,status:status},HeaderToken())
            hideLoader();
             console.log(res.data);
            if(res.data['status']==="success"){
                successToast(res.data['message']);
                window.location.href ="/admin/jobs";
                
            } else{
                errorToast(res.data['message'])
            }
        }catch (e) {
            console.log(e);
        };
  }


</script>

@endsection --}}

@extends('admin.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4 class="card-title text-dark text-center mt-3">Jobs</h4>
            <table class="table" id="myTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col">Job</th>
                        <th scope="col">Company</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($jobsActive as $job)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->user->name }}</td>
                        <td>
                            <label id="status-label-{{ $job->id }}" class="badge badge-{{ $job->status == 'active' ? 'success' : 'warning' }}">
                                {{ $job->status == 'active' ? 'Active' : 'Inactive' }}
                            </label>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-3">
                                    <select class="custom-select status-select" data-id="{{ $job->id }}" data-userID="{{ $job->user->id }}">
                                        <option value="active" {{ $job->status == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $job->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <button onclick="updateStatus(this)" class="btn btn-warning edit-btn" data-id="{{ $job->id }}" data-userID="{{ $job->user->id  }}">Update</button>
                                    <button id="deleteadminjobbtn" onclick="deletebtn(this)" data-bs-toggle="modal" data-bs-target="#deleteadminjob-modal" class="btn deleteBtn btn-danger" data-id="{{ $job->id }}">Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.pages.deleteadminjob')
<script>
async function updateStatus(button) {
    try {
        let job_id = button.getAttribute('data-id');
        let userId = button.getAttribute('data-userID');

        let statusSelect = button.parentElement.parentElement.querySelector('.status-select');
        let status = statusSelect ? statusSelect.value : null;
   console.log(status);
   console.log(job_id);
   console.log(userId);
       

            showLoader();
            let res = await axios.post("/adminjobStatusupdate", { id: job_id, user_id: userId, status: status }, HeaderToken());
            hideLoader();

            if (res.data.status === "success") {
                successToast(res.data.message);
                window.location.href = "/admin/jobs";
            } else {
                errorToast(res.data.message);
            }
        }  catch (error) {
       console.log(error);
    }
}

</script>

@endsection

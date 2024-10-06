<div class="card">
    <div class="card-body">
      <h4 class="card-title">Company Contact Details</h4>
      
      <div class="table-responsive pt-3">
        <table class="table table-bordered" id="myTable">
          <thead>
            <tr>
              <th>
                #
              </th>
              <th>
                Name
              </th>
              <th>
             Email
              </th>
              <th>
              Mobile
              </th>
              <th>
               Designation
              </th>
              <th>Action</th>
  
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                1
              </td>
              <td>
              {{ $companies->name }}
              </td>
              <td>
                {{ $companies->email }}
              </td>
              <td>
                {{ $companies->phone }}
              </td>
              <td>
                {{ $companies->designation }}
              </td>
              <td>
                
                <button onclick="editbtn()" data-bs-toggle="modal" data-bs-target="#update-modal" id="editbtn" class="btn editBtn btn-primary edit-btn" data-id="{{ $companies->id }}"  >Edit</button>
              </td>
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>

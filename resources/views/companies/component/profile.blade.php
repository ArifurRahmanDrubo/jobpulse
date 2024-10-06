<div class="card">
    <div class="card-body">
      <h4 class="card-title">Company Profile Details</h4>
      
      <div class="table-responsive pt-3">
        <table class="table table-bordered" id="myTable">
          <thead>
            <tr>
              <th>
                #
              </th>
              <th>
                Type 
              </th>
              <th>
               Website 
              </th>
              <th>
               Licence
              </th>
              <th>
               Description
              </th>
              <th>
                Established Date
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
              {{ $company->type }}
              </td>
              <td>
                {{ $company->website }}
              </td>
              <td>
                {{ $company->license }}
              </td>
              <td>
                {{ $company->description }}
              </td>
              <td>
                {{ $company->year_of_establishment }}
              </td>
              <td>
                
                <button onclick="editbtn()" data-bs-toggle="modal" data-bs-target="#update-modal" id="editbtn" class="btn editBtn btn-primary edit-btn" data-id="{{ $company->id }}" data-type="{{ $company->type }}" data-website="{{ $company->website }}" data-license="{{ $company->license }}" data-year="{{ $company->year_of_establishment }}">Edit</button>
              </td>
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>




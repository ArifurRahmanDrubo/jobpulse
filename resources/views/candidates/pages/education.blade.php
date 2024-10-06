@extends('candidates.dashboard')
@section('content')
<div class="col-lg-12 mt-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Education</h4>
            
            <div class="table-responsive">
                <table class="table " id="myTable">
                    <thead>
                        <tr>
                            <th>Degree</th>
                            <th>University</th>
                            <th>Department</th>
                            <th>Passing Year</th>
                            <th>CGPA</th>
                            <th>College</th>
                            <th>HSC GPA</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
              
                        <tbody>

                            <tr>
                                <td>{{ $education->bechelors }}</td>
                                <td>{{ $education->university_name }}</td>
                                <td class="text-success">{{ $education->department }} </td>
                                <td class="text-success">{{ $education->hons_passing_year }} </td>
                                <td><label class="badge badge-success">{{ $education->cgpa }}</label></td>
                               <td>{{ $education->hsc_college_name }}</td>
                               <td>{{ $education->hsc_gpa }}</td>
                                <td class="d-flex">
                                    <input type="hidden" name="id" id="educationid" value="{{ $education->id }}">
                                    
                                    <button onclick="Educationupdate('{{ $education->id }}')"   id="updateEducation" data-bs-toggle="modal" data-bs-target="#updateEducation-modal"  class="btn mr-1 btn-primary ">Update</button>
                                    <button  id="deleteEducation" data-bs-toggle="modal" data-bs-target="#deleteEducation-modal"  class="btn deleteBtn btn-danger " data-id="{{ $education->id }}"  >Delete</button>
                                    {{-- <form method="POST" action="{{ url('/candidate/education/delete/'.$education->id ) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger confirm-button">Delete</button>
                                    </form> --}}
                                </td>
                            </tr>

                        </tbody>
                  
                </table>
            
        </div>
    </div>
</div>
</div>
@include('candidates.component.editEducation')
@include('candidates.component.deleteEducation')
@endsection
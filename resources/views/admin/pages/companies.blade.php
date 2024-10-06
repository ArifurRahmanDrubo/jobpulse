@extends('admin.dashboard')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table class="table" id="myTable">
    <thead class="thead-dark">
      <tr>
        <th scope="col">S/N</th>
     
        <th scope="col">Action </th>
       
      </tr>
    </thead>
    

    <tbody>
     @foreach ($companies as $company)
     <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $company->name }}</td>
       
        <td >
          <input type="hidden" name="id" id="company_id" value="{{ $company->id }}}">
          <button onclick="companyView('{{ $company->id }}')"   id="deleteadminCompany" data-bs-toggle="modal" data-bs-target="#CompaniView-modal"  class="btn deleteBtn btn-primary "  >View</button>
        </td>
      </tr>
     @endforeach

    </tbody>
  </table>
    </div>
  </div>
</div>
@include('admin.pages.companiesProfileView')

@endsection
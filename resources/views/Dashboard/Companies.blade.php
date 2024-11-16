@extends('layouts.admindashboard')

@section('content')
<div class="page-content">

				<div class="row">
                   <div class="col-12 col-lg-12 d-flex">
                    
                      <div class="card radius-10 w-100">
						<div class="card-header">
                        <div class="row">
                   <div class="col-10 col-lg-10 d-flex">
                    
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Companies</h6>
								</div>
							</div>
                    </div>
                    <div class="col-2 col-lg-2 d-flex">
							<div class="d-flex align-items-center">
								<div>
									<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Add Company
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="feedbackMessage" class="alert d-none" role="alert"></div>
           <!-- Company Details Form -->
           <form id="companyDetailsForm">
          @csrf
          <div class="form-group">
            <label for="companyName">Company Name</label>
            <input type="text" class="form-control" id="companyName" name="company_name" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
          </div>
          <div class="form-group">
            <label for="payrollDate">Payroll Date</label>
            <input type="date" class="form-control" id="payrollDate" name="payroll_date" required>
          </div>
          <div class="form-group">
            <label for="staffCount">Number of Staff</label>
            <input type="number" class="form-control" id="staffCount" name="staff_count" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      
    </div>
  </div>
</div>
								</div>
							</div>
                    </div>
                    </div>
						</div>
                        
						  <div class="card-body">
                            
						 
                          <div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>#ID</th>
										<th>Company Name</th>
										<th>Phone Number</th>
										<th>Email</th>
										<th>Payroll date</th>
										<th>No of Staff</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
									</tr>
								</thead>
								<tbody>
            @foreach($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->company_name }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->phone }}</td>
                <td>{{ $company->payroll_date }}</td>
                <td>{{ $company->staff_count }}
                    <br>
                    <a href="{{ route('companies.staff', $company->id) }}" class="btn btn-primary btn-sm">Staff</a>
                </td>
                <td>{{ $company->created_at }}</td>
                <td>
                @if($company->status == 0)
                                      <div class="btn-group" role="group" aria-label="Basic example">
                                    
                                    <button type="button" class="btn btn-outline-danger" onclick="CompanyActivation({{ $company->id }}, 'deactivate')">Deactivate</button>
                                    </div>
                                      @else
                                      <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-outline-success" onclick="CompanyActivation({{ $company->id }}, 'activate')">Activate</button>
                                    
                                    </div>
                                      @endif
                </td>
            </tr>
            @endforeach
								</tbody>
								<tfoot>
									<tr>
                                    <th>#ID</th>
										<th>Company Name</th>
										<th>Phone Number</th>
										<th>Email</th>
										<th>Payroll date</th>
										<th>No of Staff</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
						  </div>
					  </div>
				   </div>
				</div><!--end row-->
</div>
@endsection

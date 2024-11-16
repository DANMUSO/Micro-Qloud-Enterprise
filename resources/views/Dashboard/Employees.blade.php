@extends('layouts.admindashboard')

@section('content')
<div class="page-content">

				<div class="row">
        
                   <div class="col-12 col-lg-12 d-flex">
                    
                      <div class="card radius-10 w-100">
						
                        <div class="row">
                        <div class="col-12 col-lg-12 d-flex"><br></div>
                   <div class="col-1 col-lg-1 d-flex">
                    
                    </div> 
                    <div class="col-6 col-lg-6 d-flex">
                    <br>
<br>
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Staff of {{ $company->company_name }} </h6>
                        </div>
                    </div>
                    </div>
                    <div class="col-3 col-lg-3 d-flex">
                      <br>
                      <br>
                      								<!-- Button trigger modal -->
                                      <button type="button" class="btn btn-outline-success" onclick="PaymentUpdate({{ $company->id }})">Make Payment</button>
                    </div>
                    <div class="col-2 col-lg-2 d-flex">
                    
							<div class="d-flex align-items-center">
								<div>
									<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Add Employee
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="feedbackMessage" class="alert d-none" role="alert"></div>
          <!-- resources/views/employees/create_employee.blade.php -->
<form id="employeeForm">
    @csrf
    <div class="form-group">
        <label for="name">Employee Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="phone_no">Phone Number</label>
        <input type="text" class="form-control" id="phone_no" name="phone_no" required>
    </div>
    <div class="form-group">
        <label for="amount">Amount</label>
        <input type="number" class="form-control" id="amount" name="amount" required>
    </div>
    <div class="form-group">
        <label for="company_id">Company</label>
        <input type="number" class="form-control" value="{{ $company->id }}" id="company_id" name="company_id" required>
       
    </div>
    <button type="submit" class="btn btn-primary">Add Employee</button>
</form>

<!-- Modal for showing alerts -->
<div id="responseMessage" class="alert alert-success mt-3" style="display: none;"></div>

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
										<th>Name</th>
										<th>Email</th>
										<th>Phone No</th>
										<th>Amount</th>
										<th>Status</th>
                                        <th>Action</th>
									</tr>
								</thead>
								<tbody>
                                @foreach($staff as $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone_no }}</td>
                                    <td>{{ $employee->amount }}</td>
                                    <td>{{ $employee->status == 0 ? 'Active' : 'Inactive' }}</td>
                                    <td> 
                                      @if($employee->status == 0)
                                      <div class="btn-group" role="group" aria-label="Basic example">
                                    
                                    <button type="button" class="btn btn-outline-danger" onclick="changeActivation({{ $employee->id }}, 'deactivate')">Deactivate</button>
                                    </div>
                                      @else
                                      <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-outline-success" onclick="changeActivation({{ $employee->id }}, 'activate')">Activate</button>
                                    
                                    </div>
                                      @endif
                                 
                                    </td>
                                </tr>
                                 @endforeach
									
								</tbody>
								<tfoot>
									<tr>
										<th>#ID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone No</th>
										<th>Amount</th>
										<th>Status</th>
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

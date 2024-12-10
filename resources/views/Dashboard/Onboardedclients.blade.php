@extends('layouts.admindashboard')

@section('content')
<div class="page-content">

				<div class="row">
                   <div class="col-12 col-lg-12 d-flex">
                    
                      <div class="card radius-10 w-100">
						<div class="card-header">
						<div class="row">
                   <div class="col-md-2 col-lg-10 d-flex">
                    
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Clients</h6>
								</div>
							</div>
                    </div>
                    <div class="col-md-2  col-lg-2 d-flex">
							<div class="d-flex align-items-center">
								<div>
																	<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
								Add Client
								</button>

								<!-- Modal -->
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Add Client</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
									<div id="feedbackMessage" class="alert d-none" role="alert"></div>
										<!-- Company Details Form -->
										<form id="clientDetailsForm">
										@csrf
										<div class="form-group">
											<label for="fullName">Full Name</label>
											<input type="text" class="form-control" id="fullName" name="full_name" required>
										</div>
										<div class="form-group">
											<label for="email">Email</label>
											<input type="email" class="form-control" id="email" name="email" required>
										</div>
										<div class="form-group">
											<label for="phone">Phone Number</label>
											<input type="number" class="form-control" id="phone" name="phone" required>
										</div>
										<div class="form-group">
											<label for="location">Location Address</label>
											<input type="text" class="form-control" id="location" name="location" required>
										</div>
										<div class="form-group">
											<label for="shopName">Shop Name</label>
											<input type="text" class="form-control" id="shopName" name="shop_name" required>
										</div>
										<div class="form-group">
											<label for="photo">Photo</label>
											<input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
										</div>
										<div class="form-group">
											<label for="permit">Permit</label>
											<input type="file" class="form-control" id="permit" name="permit" accept="image/*,application/pdf" required>
										</div>
										<div class="form-group">
											<label for="idPhotos">ID Photos</label>
											<input type="file" class="form-control" id="idPhotos" name="id_photos[]" accept="image/*" multiple required>
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
										<th>Full Name</th>
										<th>Email</th>
										<th>Phone Number</th>
										<th>Shop Name</th>
										<th>Location Address</th>
										<th>Photo</th>
										<th>Business Permit</th>
										<th>ID Photos</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($clients as $client)
									<tr>
										<td>{{$client->id}}
										<br>
										<a href="{{ route('client.loans', $client->id) }}" class="btn btn-primary btn-sm">Loans</a>
										</td>
										<td>{{$client->full_name}}</td>
										<td>{{$client->email}}</td>
										<td>{{$client->phone}}</td>
										<td>{{$client->shop_name}}</td>
										<td>{{$client->location}}</td>
										<td><img src="{{ asset('storage/photos/' . $client->photo) }}" alt="Photo" class="hover-effect" width="50"></td>
										<td>
										@if (Str::endsWith($client->permit, ['.jpg', '.jpeg', '.png', '.gif']))
											<!-- Display image -->
											<img src="{{ asset('storage/permits/'.$client->permit) }}" alt="Permit" class="hover-effect" width="50">
										@elseif (Str::endsWith($client->permit, ['.pdf']))
											<!-- Provide a link or embed PDF -->
											<a href="{{ asset('storage/permits/'.$client->permit) }}" target="_blank" class="btn btn-sm btn-primary">
												View PDF
											</a>
										@else
											<!-- Handle other file types -->
											<span class="text-danger">Invalid file type</span>
										@endif
									</td>
										<td>
											@foreach (json_decode($client->id_photos) as $photo)
												<img src="{{ asset('storage/id_photos/' . $photo) }}" alt="ID Photo" class="hover-effect" width="50">
											@endforeach
										</td>
										<td>
										@if($client->status == 1)
                                      <div class="btn-group" role="group" aria-label="Basic example">
                                    
                                    <button type="button" class="btn btn-outline-danger" onclick="clientActivation({{ $client->id }}, 'deactivate')">Deactivate</button>
                                    </div>
                                      @else
                                      <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-outline-success" onclick="clientActivation({{ $client->id }}, 'activate')">Activate</button>
                                    
                                    </div>
                                      @endif
                                        </td>
									</tr>
									@endforeach
									
									
									
								</tbody>
								<tfoot>
									<tr>
										
									<th>#ID</th>
										<th>Full Name</th>
										<th>Email</th>
										<th>Phone Number</th>
										<th>Shop Name</th>
										<th>Location Address</th>
										<th>Photo</th>
										<th>Business Permit</th>
										<th>ID Photos</th>
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

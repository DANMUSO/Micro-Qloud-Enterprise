<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/rocker/demo/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Oct 2024 14:00:08 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('vertical/assets/images/logo3.png')}}" type="image/png"/>
	<!--plugins-->
	<link href="{{asset('vertical/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
	<link href="{{asset('vertical/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('vertical/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('vertical/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet"/>
	<!-- loader-->
	<link href="{{asset('vertical/assets/css/pace.min.css')}}" rel="stylesheet"/>
	<script src="{{asset('vertical/assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('vertical/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('vertical/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{asset('vertical/assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('vertical/assets/css/icons.css')}}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('vertical/assets/css/dark-theme.css')}}"/>
	<link rel="stylesheet" href="{{asset('vertical/assets/css/semi-dark.css')}}"/>
	<link rel="stylesheet" href="{{asset('vertical/assets/css/header-colors.css')}}"/>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link href="{{asset('vertical/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />


	<title>Micro-Qloud Ltd</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('vertical/assets/images/logo3.png')}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Micro-Qloud Ltd</h4>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
						<div class="menu-title"><a href="{{url('home')}}">Dashboard</a></div>
				
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-donate-blood"></i>
						</div>
						<div class="menu-title">Transactions MGT</div>
					</a>
					<ul>
						<li> <a href="{{url('loanrequests')}}"><i class='bx bx-radio-circle'></i>Loan Request</a>
						</li>
						<li> <a href="{{url('disbursements')}}"><i class='bx bx-radio-circle'></i>Disbursements</a>
						</li>
						<li> <a href="{{url('repayments')}}"><i class='bx bx-radio-circle'></i>Repayments</a>
						</li>
						
						<li> <a href="{{url('pendingpayments')}}"><i class='bx bx-radio-circle'></i>Pending Payments</a>
						</li>
						<li> <a href="{{url('prospectloanees')}}"><i class='bx bx-radio-circle'></i>Prospect Loanees</a>
						</li>
						<li> <a href="{{url('activeloanees')}}"><i class='bx bx-radio-circle'></i>Active Loanees</a>
						</li>
						<li> <a href="{{url('inactiveloanees')}}"><i class='bx bx-radio-circle'></i>Inactive Loanees</a>
						</li>
						<li> <a href="{{url('declinedtransactions')}}"><i class='bx bx-radio-circle'></i>Declined Transactions</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-line-chart"></i>
						</div>
						<div class="menu-title">Clients MGT</div>
					</a>
					<ul>
						<li> <a href="{{url('onboardedclients')}}"><i class='bx bx-radio-circle'></i>Onboarded Clients</a>
						</li>
						<li> <a href="{{url('activeclients')}}"><i class='bx bx-radio-circle'></i>Active Clients</a>
						</li>
						<li> <a href="{{url('inactiveclients')}}"><i class='bx bx-radio-circle'></i>Inactive Clients</a>
						</li>
						<li> <a href="{{url('prospectclients')}}"><i class='bx bx-radio-circle'></i>Prospect Clients</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">Users MGT</div>
					</a>
					<ul>
						<li> <a href="{{url('systemusers')}}"><i class='bx bx-radio-circle'></i>System Users</a>
						</li>
						<li> <a href="{{url('roles')}}"><i class='bx bx-radio-circle'></i>Roles</a>
						</li>
						<li> <a href="{{url('departments')}}"><i class='bx bx-radio-circle'></i>Departments</a>
						</li>
						<li> <a href="{{url('branches')}}"><i class='bx bx-radio-circle'></i>Branches</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Products MGT</div>
					</a>
					<ul>
						<li> <a href="{{url('products')}}"><i class='bx bx-radio-circle'></i>Products</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Companies MGT</div>
					</a>
					<ul>
						<li> <a href="{{url('companies')}}"><i class='bx bx-radio-circle'></i>Companies</a>
						</li>
						
					</ul>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand gap-3">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>


					  <div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center gap-1">
							<li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
								<a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-laungauge d-none d-sm-flex">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="avascript:;" data-bs-toggle="dropdown"><img src="assets/images/county/02.png" width="22" alt="">
								</a>
							
							</li>
							<li class="nav-item dark-mode d-none d-sm-flex">
								<a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-app">
								<div class="dropdown-menu dropdown-menu-end p-0">
									<div class="app-container p-2 my-2">
									 
									</div>
								</div>
							</li>

							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" data-bs-toggle="dropdown"><span class="alert-count">4</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									
									<div class="header-notifications-list">
									
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
											<div class="notify bg-light-info text-info">MN
											</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Margaret Njeri<span class="msg-time float-end">14
												sec ago</span></h6>
													<p class="msg-info">Loan of KES 6,500 disbursed!</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
											<div class="notify bg-light-info text-info">ZM
											</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Zina Muthoni<span class="msg-time float-end">28 min
												ago</span></h6>
													<p class="msg-info">Loan of KES 6,500 disbursed!</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-info text-info">BM
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Bright Mwangi<span
												class="msg-time float-end">2 hrs ago</span></h6>
													<p class="msg-info">Loan of KES 6,500 disbursed!</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
											<div class="notify bg-light-info text-info">DK
											</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daniel Kimani<span class="msg-time float-end">15
												min ago</span></h6>
													<p class="msg-info">Loan of KES 6,500 disbursed!</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">
											<button class="btn btn-primary w-100">View All Notifications</button>
										</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
							
								<div class="dropdown-menu dropdown-menu-end">
									
									<div class="header-message-list">
									
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown px-3">
						<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{asset('vertical/assets/images/logo3.png')}}" class="user-img" alt="user avatar">
							<div class="user-info">
								<p class="user-name mb-0">
								{{ Session::get('userName') }}
								</p>
								<p class="designattion mb-0">CEO</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-user fs-5"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-cog fs-5"></i><span>Settings</span></a>
							
							<li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-log-out-circle"></i><span>
								<a class="nav-link" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">

                                                        <p> 
                                                        {{ __('Logout') }}
                                                        </p>
                                                        </a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
							</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
		@yield('content')
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		 <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2024. All right reserved. <b>Qloud Point Solutions - Micro-Qloud Ltd</b></p>
		</footer>
	</div>
	<!--end wrapper-->


	<!-- search modal -->
    <div class="modal" id="SearchModal" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
		  <div class="modal-content">
			<div class="modal-header gap-2">
			  <div class="position-relative popup-search w-100">
				<input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search" placeholder="Search">
				<span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i class='bx bx-search'></i></span>
			  </div>
			  <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="search-list">
				   <p class="mb-1">Html Templates</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action active align-items-center d-flex gap-2 py-1"><i class='bx bxl-angular fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vuejs fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-magento fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-shopify fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Web Designe Company</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-windows fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-dropbox fs-4' ></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-opera fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-wordpress fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Software Development</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-mailchimp fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-zoom fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-sass fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vk fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Online Shoping Portals</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-slack fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-skype fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-twitter fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vimeo fs-4'></i>eCommerce Html Templates</a>
				   </div>
				</div>
			</div>
		  </div>
		</div>
	  </div>
    <!-- end search modal -->

	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{asset('vertical/assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="{{asset('vertical/assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('vertical/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('vertical/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('vertical/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('vertical/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('vertical/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{asset('vertical/assets/plugins/chartjs/js/chart.js')}}"></script>
	<script src="{{asset('vertical/assets/js/index.js')}}"></script>
	<!--app JS-->
	<script src="{{asset('vertical/assets/js/app.js')}}"></script>
    <script>
        setInterval(function() {
    $.ajax({
        url: '/update-payroll-date',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}' // CSRF token for Laravel
        },
        success: function(response) {
            if (response.status === 'disabled') {
                $('.payroll-button')
                    .addClass('btn-secondary')
                    .prop('disabled', true)
                    .text(response.message);
            } else if (response.status === 'success') {
                $('.payroll-button')
                    .removeClass('btn-secondary')
                    .prop('disabled', false)
                    .text('Apply Now');
            }
        }
    });
}, 3600000); // Check every minute

    </script>
	<script>
		function payLoan(loanId, status) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: "Are you sure?",
        text: "You want to update this transaction?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, update it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Send AJAX request to update transaction status
            $.ajax({
                url: '/transactions/update-status', // Update with your route URL
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Include CSRF token
                    id: loanId,
                    status: status
                },
                success: function(response) {
                    if (response.success) {
                        swalWithBootstrapButtons.fire(
                            "Updated!",
                            "The transaction status has been updated.",
                            "success"
                        );
                        // Optional: Reload the page or update the UI
                        location.reload();
                    } else {
                        swalWithBootstrapButtons.fire(
                            "Error!",
                            "Failed to update the transaction.",
                            "error"
                        );
                    }
                },
                error: function(xhr) {
                    swalWithBootstrapButtons.fire(
                        "Error!",
                        "Something went wrong. Please try again.",
                        "error"
                    );
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
                "Cancelled",
                "The transaction is unchanged.",
                "error"
            );
        }
    });
}

		</script>
	<script>
		function PaymentUpdate(companyId) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, proceed!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("payment.update") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    company_id: companyId
                },
                success: function(response) {
                    swalWithBootstrapButtons.fire({
                        title: "Updated!",
                        text: response.message,
                        icon: "success"
                    });
                },
                error: function(xhr) {
                    swalWithBootstrapButtons.fire({
                        title: "Error!",
                        text: "Something went wrong. Please try again.",
                        icon: "error"
                    });
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire({
                title: "Cancelled",
                text: "No changes were made.",
                icon: "error"
            });
        }
    });
}
		</script>
	<script>
		function changeStatus(id, status) {
    // Define the action text based on the status
    let actionText = status === 2 ? 'approve' : 'decline';

    // Configure SweetAlert with Bootstrap-styled buttons
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });

    // Show confirmation dialog
    swalWithBootstrapButtons.fire({
        title: `Are you sure you want to ${actionText} this request?`,
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: `Yes, ${actionText} it!`,
        cancelButtonText: "No, cancel!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform AJAX request if confirmed
            $.ajax({
                url: `/loanrequest/status/${id}`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status
                },
                success: function(response) {
                    if (response.success) {
						swalWithBootstrapButtons.fire({
						title: `${actionText}d!`,
						text: `Loan has been ${actionText}d.`,
						icon: "success"
						}).then(() => {
                            location.reload(); // Reload page to update button state
                        });
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function() {
                    toastr.error('An error occurred. Please try again.');
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            // Cancelled action message
            swalWithBootstrapButtons.fire({
                title: "Cancelled",
                text: `The request was not ${actionText}d.`,
                icon: "error"
            });
        }
    });
}
//Employees Activation & Deactivation
function changeActivation(id, action) {
    // Configure action text and endpoint based on the action
    let actionText = action === 'activate' ? 'activate' : 'deactivate';
    let confirmButtonColor = action === 'activate' ? 'btn btn-success' : 'btn btn-danger';

    // Configure SweetAlert with Bootstrap-styled buttons
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: confirmButtonColor,
            cancelButton: "btn btn-secondary"
        },
        buttonsStyling: false
    });

    // Show confirmation dialog
    swalWithBootstrapButtons.fire({
        title: `Are you sure you want to ${actionText} this employee?`,
        text: "This action can be reverted later.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: `Yes, ${actionText} it!`,
        cancelButtonText: "No, cancel!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform AJAX request if confirmed
            $.ajax({
                url: `/employee/activation/${id}`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    action: action
                },
                success: function(response) {
                    if (response.success) {
                        swalWithBootstrapButtons.fire({
                            title: actionText.charAt(0).toUpperCase() + actionText.slice(1) + "d!",
                            text: `The employee has been ${actionText}d.`,
                            icon: "success"
                        }).then(() => {
                            location.reload(); // Reload page to update button state
                        });
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function() {
                    toastr.error('An error occurred. Please try again.');
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            // Cancelled action message
            swalWithBootstrapButtons.fire({
                title: "Cancelled",
                text: `The employee was not ${actionText}d.`,
                icon: "error"
            });
        }
    });
}
//Company Activation $ Deactivation
function CompanyActivation(companyId, action) {
    // Custom SweetAlert with Bootstrap buttons
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });

    // Determine the confirmation message based on the action
    let title, text, successText;
    if (action === 'activate') {
        title = "Are you sure you want to activate?";
        text = "The company will be activated and users will be restored.";
        successText = "The company has been activated, and the associated users have been restored.";
    } else if (action === 'deactivate') {
        title = "Are you sure you want to deactivate?";
        text = "The company will be deactivated, and associated users will be soft deleted.";
        successText = "The company has been deactivated, and the associated users have been soft deleted.";
    }

    // Show confirmation dialog
    swalWithBootstrapButtons.fire({
        title: title,
        text: text,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, proceed!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Proceed with the action
            $.ajax({
                url: '{{ route("company.changeStatus") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    company_id: companyId,
                    action: action
                },
                success: function(response) {
                    if (response.success) {
                        swalWithBootstrapButtons.fire({
                            title: action === 'activate' ? "Activated!" : "Deactivated!",
                            text: successText,
                            icon: 'success',
                            imageWidth: 100,
                            imageHeight: 100,
                            imageAlt: 'Custom image',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            location.reload(); // Reload page to update button state
                        });
                    } else {
                        swalWithBootstrapButtons.fire({
                            title: 'Error',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr) {
                    swalWithBootstrapButtons.fire({
                        title: 'Error',
                        text: 'Something went wrong. Please try again.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire({
                title: "Cancelled",
                text: "Your action has been cancelled.",
                icon: "error",
                confirmButtonText: 'OK'
            });
        }
    });
}

	</script>
	<script>
  $(document).ready(function() {
    // Handle form submission
    $('#companyDetailsForm').on('submit', function(e) {
      e.preventDefault();

      // Make the AJAX request
      $.ajax({
        url: "{{ route('submit.company') }}",
        method: 'POST',
        data: $(this).serialize(),
        success: function(response) {
         // Show the success message inside the modal
		 $('#feedbackMessage')
          .removeClass('d-none alert-danger')
          .addClass('d-block alert-success')
          .text(response.success); // Display success message
          
        // Optionally, reset the form fields
        $('#companyDetailsForm')[0].reset();

        // Hide the modal after a brief delay
        setTimeout(function() {
          $('#companyDetailsModal').modal('hide');
        }, 2000);
      },
      error: function(xhr, status, error) {
        // Show the error message inside the modal
        $('#feedbackMessage')
          .removeClass('d-none alert-success')
          .addClass('d-block alert-danger')
          .text('There was an error submitting the form. Please try again.'); // Display error message
      }
      });
    });
  });
</script>
<script>
$(document).ready(function() {
    // Handle form submission
    $('#employeeForm').on('submit', function(e) {
        e.preventDefault();

        // Clear any previous alert
        $('#responseMessage').hide().removeClass('alert-success alert-danger');

        // Send AJAX request
        $.ajax({
            url: '{{ route('employees.store') }}',
            method: 'POST',
            data: $(this).serialize(), // Serialize form data
            success: function(response) {
                $('#responseMessage')
                    .show()
                    .addClass('alert-success')
                    .text(response.success);
                $('#employeeForm')[0].reset(); // Reset form fields
            },
            error: function(xhr, status, error) {
                $('#responseMessage')
                    .show()
                    .addClass('alert-danger')
                    .text('There was an error submitting the form.');
            }
        });
    });
});
</script>
	<script>
		new PerfectScrollbar(".app-container")
	</script>
	<script src="{{asset('vertical/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('vertical/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
</body>


<!-- Mirrored from codervent.com/rocker/demo/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Oct 2024 14:00:08 GMT -->
</html>




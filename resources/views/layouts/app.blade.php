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


	<title>Qloud Point Solutions - Micro-Qloud Ltd</title>
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
					<h cl6ss="logo-text">Qloud Point Solutions Ltd</h6>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
						<div class="menu-title"><a href="{{url('home')}}">Dashboard</a></div>
				
				</li>
               
                <li>
						<div class="menu-title"><a href="{{url('transactions')}}">Transactions</a></div>
				
				</li>
                <li>
						<div class="menu-title"><a href="{{url('utilities')}}">Utilities</a></div>
				
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
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" data-bs-toggle="dropdown">
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									
									<div class="header-notifications-list">
									
										
										
										
									
									</div>
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
								<p class="designattion mb-0">{{ Session::get('employee')['company']['company_name'] }}</p>
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
	<link rel="icon" href="{{asset('vertical/assets/images/logo3.png')}}" type="image/png"/>
	<script src="{{asset('vertical/assets/js/app.js')}}"></script>
	<script>
    $('#applyNowBtn').click(function () {
        // Disable the button immediately after it's clicked to prevent multiple submissions
        $(this).prop('disabled', true);
        $('#statusMessage').text('Processing...');

        // AJAX request
        $.ajax({
            url: '{{ route("transaction.store") }}', // Route to handle request
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}', // CSRF protection
                employee_id: '{{ Session::get("employee")["id"] }}',
                amount: '{{ Session::get("employee")["amount"] }}',
                payroll_date: '{{ Session::get("employee")["company"]["payroll_date"] }}',
                status: 0 // Default status
            },
            success: function (response) {
                // Show success message and keep button disabled
                $('#statusMessage').text('You have applied successfuly. Processing your loan now!');
            },
            error: function (xhr, status, error) {
                // Show error message and re-enable button for retry
                $('#statusMessage').text('An error occurred: ' + error);
                $('#applyNowBtn').prop('disabled', false); // Re-enable button on error
            }
        });
    });
</script>
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




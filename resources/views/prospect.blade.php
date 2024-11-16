<!doctype html>
<html lang="en">
  <head>
    <title>Micro Qloud Enterprise Ltd</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('loginv1/css/style.css')}}">
  </head>
  <body>
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
        
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-5">
            <div class="login-wrap p-4 p-md-5">
          
              <h3 class="text-center mb-4">Submit Your Information</h3>
              <form id="ajaxLoginForm" method="POST">
                @csrf
                <div class="form-group">
                  <input id="name" type="text" class="form-control" placeholder="Name" name="name" required>
                </div>
                <div class="form-group">
                  <input id="phone" type="text" class="form-control" placeholder="Phone" name="phone" required>
                </div>
                <div class="form-group">
                  <input id="email" type="email" class="form-control" placeholder="Email" name="email" required>
                </div>
                <div class="form-group">
                  <input id="employer_name" type="text" class="form-control" placeholder="Employer Name" name="employer_name" required>
                </div>
                <div class="form-group">
                  <input id="address" type="text" class="form-control" placeholder="Address" name="address" required>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="{{asset('loginv1/js/jquery.min.js')}}"></script>
    <script src="{{asset('loginv1/js/popper.js')}}"></script>
    <script src="{{asset('loginv1/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('loginv1/js/main.js')}}"></script>

    <script>
      $(document).ready(function () {
        $('#ajaxLoginForm').on('submit', function (e) {
          e.preventDefault();
          const formData = $(this).serialize();
          
          $.ajax({
            url: "{{ route('FormProspect') }}",
            type: "POST",
            data: formData,
            dataType: 'json', // Expect JSON response
            success: function (response) {
              if(response.success) {
                alert(response.message); // Display success message
                // Optionally, redirect or clear form
              
              } else {
                alert('Something went wrong. Please try again!');
              }
            },
            error: function (xhr) {
              const errors = xhr.responseJSON.errors;
              let errorMessages = '';
              for (const field in errors) {
                errorMessages += errors[field][0] + '\n';
              }
              alert(errorMessages); // Display form errors
            }
          });
        });
      });
    </script>
  </body>
</html>

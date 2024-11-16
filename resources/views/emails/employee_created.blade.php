<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Qloud Point Solutions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #001858; /* Dark blue background */
            color: #f59e0b; /* Orange text color */
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #001858;
            color: #f59e0b;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
            text-align: center;
        }
        h1 {
            font-size: 24px;
            color: #f59e0b; /* Orange color for header */
        }
        p {
            font-size: 16px;
            color: #ffffff; /* White text color for some text */
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #f59e0b; /* Orange button color */
            color: #001858;
            text-decoration: none;
            font-weight: bold;
            border-radius: 4px;
        }
        a:hover {
            background-color: #d98309; /* Slightly darker orange on hover */
        }
        .logo {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <br>
        <h1>Welcome to QPSs, {{ $name }}!</h1>
        <p>Your account has been created successfully with the following details:</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Password:</strong> {{ $password }}</p>
        <p>Please log in to access advanced loan options and other services.</p>
        <br>
        <a href="https://qloudpointsolutions.com/">Log in to Get Advanced Loan</a>
    </div>
</body>
</html>

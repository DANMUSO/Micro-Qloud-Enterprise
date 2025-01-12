<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - Micro Qloud Enterprise Ltd</title>
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
            line-height: 1.5;
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
        .highlight {
            color: #f59e0b;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thank You for Your Payment!</h1>
        <p>We appreciate your timely loan payment of <span class="highlight">KSH {{ $amount }}</span>. Your commitment helps us serve you better and build a strong relationship.</p>
        <p>Our system is actively analyzing your repayment history to <span class="highlight">build your credit score</span>. Based on your performance, your <span class="highlight">credit limit</span> will be reviewed and increased in the future.</p>
        <p>Stay consistent with your payments to unlock higher limits and enjoy more financial flexibility!</p>
        <br>
        <a href="https://micro-qloudenterprise.com">Learn More</a>
    </div>
</body>
</html>

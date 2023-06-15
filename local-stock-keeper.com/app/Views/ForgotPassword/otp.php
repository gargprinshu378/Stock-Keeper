<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter OTP</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <!-- Card Section for form -->
    <div class="card">

        <!-- Creating form with method post -->
        <form method="post" action="/FP/checkOTP">
            <div>
                <!-- Input OTP -->
                <h2>One Time Password</h2>
                <input name="OTP" id="OTP" type="password" placeholder="Enter OTP" required>
            </div>

            <!-- Submit -->
            <div>
                <input type="submit"  value="Submit">
            </div>

            <!-- Input another email link -->
            <div>
                <a href="/Home/index">Enter another Email</a>
            </div>
        </form>
        
    </div>
</body>
</html>
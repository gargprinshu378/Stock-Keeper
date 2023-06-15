<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Password</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="/js/new.js"></script>
    <script>

    // Function to show the password type in the form of text. 
    function myFunction() {
    var x = document.getElementById("Password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }

    // Function to show the password type in the form of text.
    function myFunction2() {
    var x = document.getElementById("Confirm_Password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }

    </script>
</head>
<body>
    <!-- Card Section for form -->
    <div class="card">

        <!-- Creating form with method post -->
        <form method="post" action="/FP/reset">
            <div>
                <!-- Input Password -->
                <h2>Password</h2>
                <input name="Password" id="Password" type="password" placeholder="Enter Password" required>
                <!-- Checkbox to show Password -->
                <input type="checkbox" onclick="myFunction()" >Show Password
            </div>

            <!-- Confirm Password -->
            <div>
                <h2>Confirm Password</h2>
                <input name="Password" id="Confirm_Password" type="password" placeholder="Re-enter Password" required>
                <!-- Checkbox to show Password -->
                <input type="checkbox" onclick="myFunction2()" >Show Password
            </div>

            <!-- Submit -->
            <div>
            <input type="submit" value="Submit">
            </div>
        </form>
        
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Stock</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <!-- Card Section for form -->
    <div class="card">

        <!-- Creating a form with method post -->
        <form method="post" action="/Update/create">
            <!-- Input to update Stock -->
            <div>
                <h2>Enter Stock to Update</h2>
                <input type="hidden" name="Stock_no" value="<?php echo $Stock_no ?>">
                <input name="updateStock" type="text" value="<?php echo $Stock?>" autocomplete="off" required>
            </div>

            <div>
                <!-- Input Price to Update -->
                <h2>Enter Price to Update</h2>
                <input type="hidden" name="Stock_no" value="<?php echo $Stock_no ?>">
                <input name="updatePrice" type="text" value="<?php echo $Stock_price?>" autocomplete="off" required>
            </div>

            <!-- Submit type -->
            <div>
                <input type="submit" value="Update">
            </div>

            <!-- Back link -->
            <div>
                <a href="/Display/display">Back</a>
            </div>
        </form>
        
    </div>
</body>
</html>
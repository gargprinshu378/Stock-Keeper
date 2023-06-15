<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Keeper App</title>
    <link rel="stylesheet" href="/css/mainpage.css">
</head>
<body>
    <!-- Header Section -->
    <div class="flexbox1">
        <div class="flexbox">

            <!-- Creating a form with method post -->
            <form method="post" action="/Add/index">

                <!-- Input type Stock-entry to add the stocks in the database -->
                <div>
                    <input type="submit" name="addStock" value="Stock-Entry">
                </div>

            </form>

            <!-- Creating a form with method post -->
            <form method="post" action="/Home/index">

                <!-- Log out button -->
                <div>
                    <input type="submit" value="Log Out">
                </div>

            </form>

        </div>
    </div>
    <div>

        <!-- Welcome message with the email -->
        <h1>
            Welcome 
            <?php $n=''; 
            foreach($dis as $d)
            {
                $n=$d['Email'];
            } 
            echo $n; ?>
        </h1>

        <!-- Creating a table to display the added and updated stocks -->
        <table>

            <!-- Headings -->
            <th>Stock</th>
            <th>Stock Price</th>
            <th>Date Created</th>
            <th>Last Updated</th>
            <th>Delete</th>
            <th>Update</th>

            <!-- Displaying the data from the database -->
            <?php foreach($dis as $d){ ?>

            <tr>
                <td><?php echo $d['Stock'] ?></td>
                <td><?php echo $d['Stock_price'] ?></td>
                <td><?php echo $d['Date_created'] ?></td>
                <td><?php echo $d['Last_updated'] ?></td>
                <td>

                    <!-- Creating a form to delete ther stock with method post -->
                    <form method="post" action="/Delete/create">
                        <div>
                            <input type="hidden" name="Stock_no" value="<?php echo $d['Stock_no'] ?>">
                            <input type="submit" name="deleteStock" value="Delete">
                        </div>
                    </form>

                </td>
                <td>

                    <!-- Creating the form to update the stock with method post -->
                    <form method="post" action="/Update/index">
                        <div>
                            <input type="hidden" name="Stock_no" value="<?php echo $d['Stock_no'] ?>">
                            <input type="hidden" name="Stock" value="<?php echo $d['Stock'] ?>">
                            <input type="submit" name="updateStock" value="Update">
                        </div>
                    </form>
                    
                </td>
            </tr>
        
            <?php }
            ?>
        </table>
        
    </div>
</body>
</html>
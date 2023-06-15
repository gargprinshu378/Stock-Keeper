<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Stock</title>
    <link rel="stylesheet" href="/css/mainpage.css">
</head>
<body>
    <!-- Card section for form -->
    <div class="card">
        
        <div>
             <!-- Creating a form with method post -->
            <form method="post" action="/Add/create">
                <div>
                    <!-- Input Stock to add -->
                    <h2>Enter Stock to Add</h2>
                    <input name="addStock" type="text" placeholder="Enter Stock" autocomplete="off" required>
                </div>
                <div>
                    <!-- Input Price to add -->
                    <h2>Enter Price to Add</h2>
                    <input name="addPrice" type="text" placeholder="Enter Price" autocomplete="off" required>
                </div>
                <!-- Submit -->
                <div>
                    <input type="submit" value="Add">
                </div>
                <!-- Back link  -->
                <div>
                    <a href="/Display/display">Back</a>
                </div>
            </form>
        </div>

        <!-- Displaying the stock and its prices below the add stock form -->
        
        <div>
            <table>
                <th>Stock</th>
                <th>Stock Price</th>
                <?php foreach($dis as $d){ ?>
                <tr>
                    <td><?php echo $d['Stock'] ?></td>
                    <td><?php echo $d['Stock_price'] ?></td>
                </tr>
                <?php }
                ?>
            </table>
        </div>

    </div>
</body>
</html>
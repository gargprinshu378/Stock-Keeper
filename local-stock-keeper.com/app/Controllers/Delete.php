<?php

namespace app\Controllers;

use core\View;

use app\Models\Users;

use app\Mail;

/**
 * Controller class for handling stock deletion.
 */

 class Delete extends \core\Controller

 {

    /**
    * Action for handling stock deletion form submission.
     */

     public function createAction(){

        // Create a new Users object

        $user = new Users();

        // Get stock_no from POST data

        $Stock_no = $_POST['Stock_no'];

        // Try to delete the stock from the database

        if($user->deleteStock($Stock_no)) {

            // Redirect to the stock display page on success

            header('Location: /Display/display');

        }

        else{

            // Render the main page with error message on failure

            View::render('MainPage/mainpage.php',[
                'user' => $user

            ]);

        }

    }

}

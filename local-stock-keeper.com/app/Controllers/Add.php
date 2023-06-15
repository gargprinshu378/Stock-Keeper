<?php

namespace app\Controllers;

use core\View;

use app\Models\Users;

use app\Mail;

/**
 * Controller class for handling Stock creation.
 */

 class Add extends \core\Controller

 {

    /**
     * Action for rendering the stock creation form.
     */

     public function indexAction(){

        // Create a new Users object

        $var = new Users();

        // Get stocks from the database

        $dis = $var->displayStock();

        // Render the main page with stocks if available, otherwise render the main page without stocks

        if($dis){

            View::render('Add/add.php', [
                'dis'=>$dis
            ]);

        }
    }

    /**
     * Action for handling stock creation form submission.
     */

     public function createAction(){

        // Create a new Users object with POST data

        $user = new Users($_POST);

        // Try to add the stock to the database

        if($user->addStock()) {

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

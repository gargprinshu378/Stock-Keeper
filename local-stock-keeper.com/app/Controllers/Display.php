<?php

namespace app\Controllers;

use core\View;

use app\Models\Users;

/**
 * Controller class for displaying stocks.
 */

 class Display extends \core\Controller

 {

    /**
    * Action for displaying stocks.
     */

     public function displayAction(){

        // Create a new Users object

        $var = new Users();

        // Get stocks from the database

        $dis = $var->displayStock();

        // Render the main page with stocks if available, otherwise render the main page without stocks

        if($dis){

            View::render('MainPage/mainpage.php',[
                'dis'=>$dis

            ]);

        }

        else{

            View::render('MainPage/mainpage.php');

        }

    }

}

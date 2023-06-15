<?php

namespace app\Controllers;

use core\View;

use app\Models\Users;

use app\Mail;

/**
 * Controller class for handling stock update actions.
 */

 class Update extends \core\Controller
{
    /**
     * Action for rendering the stock update form.
     */

     public function indexAction(){

        $user = new Users($_POST);
        $Stock_no = $_POST['Stock_no'];
        $Stock = $_POST['Stock'];

        View::render('/Update/update.php',[
            'Stock' => $Stock,'Stock_no' => $Stock_no
        ]);

    }

    /**
     * Action for processing stock update form submission.
     */

     public function createAction(){

        $user = new Users($_POST);
        var_dump($_POST);
        $Stock_no = $_POST['Stock_no'];
        $Stock = $_POST['updateStock'];
        $Stock_price = $_POST['updatePrice'];

        if($user->updateStock($Stock_no,$Stock,$Stock_price)) {
            header('Location: /Display/display');

        }

        else{

            View::render('MainPage/mainpage.php',[
                'user' => $user

            ]);
        }
    }
}


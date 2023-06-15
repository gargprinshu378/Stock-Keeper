<?php
/**
 * @file
 * Contains the Users model class.
 */

namespace app\Models;

use \core\View;

/**
 * Class Users
 *
 * Model class for handling user data and stocks.
 *
 * @package app\Models
 */

 class Users extends \core\Model
{
    /**
     * @var string $Name User's name.
     */

     protected $Name;

    /**
     * @var string $Email User's email address.
     */

     protected $Email;

    /**
     * @var string $Password User's password.
     */

     protected $Password;

    /**
     * @var string $addStock Stock to be added.
     */

     protected $addStock;
    
    /**
     * @var string $addPrice Price to be added.
     */

    protected $addPrice;

    /**
     * @var string $Date_created Date and time when the stock is added
     */

    protected $Date_created;

    /**
     * @var int $Stock_no Stock number.
     */
    protected $Stock_no;

    /**
     * @var string $Stock Stock description.
     */

     protected $Stock;

    /**
     * @var string $Confirm_Password User's password confirmation.
     */

     protected $Confirm_Password;

    /**
     * @var array $errors Array to store validation errors.
     */

     public $errors = [];

    /**
     * Users constructor.
     *
     * @param array $data User data to be set.
     */

     public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * Save user data to the database.
     *
     * @return bool|int Return false if validation fails, otherwise return the result of the database query.
     */

     public function save()
    {

        // $this->validate();

        if (empty($this->errors)) {
            $db = static::getDB();
            $Name = mysqli_real_escape_string($db, $this->Name);
            $Email = mysqli_real_escape_string($db, $this->Email);
            $Password = mysqli_real_escape_string($db, $this->Password);

            $sql = "INSERT INTO user_details (Name, Email, Password)
                    VALUES ('$Name', '$Email', '$Password')";

            return mysqli_query($db, $sql);

        }

        return false;

    }

    /**
     * Validate user data.
     */

     public function validate()
    {
        // Name not be empty
        if ($this->Name == '') {
            $this->errors[] = 'Name is required';
        }

        // Check if it is valid email
        if (filter_var($this->Email, FILTER_VALIDATE_EMAIL) === false) {
            $this->errors[] = 'Invalid Email';
        }

        // Password must match
        if ($this->Password != $this->Confirm_Password) {
            $this->errors[] = 'Password must match confirmation';
        }

        // Email should be unique
        if (static::emailExists($this->Email)) {
            $this->errors[] = 'Email already taken';
        }
    }

    /**
     * Check if email already exists in the database.
     *
     * @param string $Email User's email address.
     *
     * @return bool Return true if email exists, false otherwise.
     */

     public static function emailExists($Email)
    {
        return static::findByEmail($Email) != false;
    }

    /**
     * Find user by email and password in the database.
     *
     * @param string $Email User's email address.
     * @param string $Password User's password.
     *
     * @return Users|null Return user object if found, null otherwise.
     */
      
    public static function findByEmail($Email,$Password)
    {
        $db = static::getDB();
        $Email = mysqli_real_escape_string($db, $Email);
        $Password = mysqli_real_escape_string($db, $Password);
        $sql = "SELECT * FROM user_details WHERE Email='$Email'AND Password='$Password'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
    
        // Convert the row to an object
        $user = null;
        if ($row) {
            $user = new static();
            foreach ($row as $key => $value) {
                $user->$key = $value;
            }
        }
        return $user;
    }

    /**
     * Find user by email in the database.
     *
     * @param string $Email User's email address.
     *
     * @return Users|null Return user object if found, null otherwise.
     */


    public static function findByEmail2($Email)
    {
        $db = static::getDB();
        $Email = mysqli_real_escape_string($db, $Email);
        $sql = "SELECT * FROM user_details WHERE Email='$Email'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
    
        // Convert the row to an object
        $user = null;
        if ($row) {
            $user = new static();
            foreach ($row as $key => $value) {
                $user->$key = $value;
            }
        }
        return $user;
    }

    /**
     * Update the password in the database.
     *
     * @param string $Password User's password.
     *
     * return the result of the database query
     */


    public static function updatePassword($Password) {
        $session_email = $_SESSION['Email'];
        $db = static::getDB();
        $sql = "UPDATE user_details SET Password = '$Password' WHERE Email = '$session_email'";
        return mysqli_query($db, $sql);    
    }

    /**
     * Add the stock in the database using the query mentioned.
     *
     *
     * return the result of the database query
     */

    public function addStock(){
        if (empty($this->errors)) {
            $session_email = $_SESSION['Email'];
            $db = static::getDB();
            $Email = mysqli_real_escape_string($db, $session_email);
            $addStock = mysqli_real_escape_string($db, $this->addStock);
            $addPrice = mysqli_real_escape_string($db, $this->addPrice);
            $Date_created = mysqli_real_escape_string($db, $this->Date_created);

            $sql = "INSERT INTO stock_details (Email, Stock, Stock_price, Date_created, Last_updated)
                    VALUES ('$Email', '$addStock', '$addPrice', '$Date_created', '$Date_created')";
    
           return mysqli_query($db, $sql);

        }

        return false;

    }

    /**
     * Delete the stock from the database.
     *
     * @param string $Stock_no
     *
     * return the result of the database query
     */

    public function deleteStock($Stock_no){
        $session_email = $_SESSION['Email'];
        $db = static::getDB();
        $Stock_no = mysqli_real_escape_string($db, $Stock_no);
        $sql = "DELETE FROM stock_details WHERE Stock_no='$Stock_no'";
        return mysqli_query($db, $sql);
    }


    /**
     * Update the Stock and its price in the database.
     *
     * @param string $Stock_no
     * @param string $Stock
     *
     * return the result of the database query
     */

    public function updateStock($Stock_no,$Stock,$Stock_price, $Last_updated){
        $session_email = $_SESSION['Email'];
        $db = static::getDB();
        $Email = mysqli_real_escape_string($db, $session_email);
        $Stock = mysqli_real_escape_string($db, $Stock);
        $Stock_no = mysqli_real_escape_string($db, $Stock_no);
        $Stock_price = mysqli_real_escape_string($db, $Stock_price);
        $Last_updated = mysqli_real_escape_string($db, $Last_updated);
        $sql = "UPDATE stock_details SET Stock='$Stock',Stock_price='$Stock_price',Last_updated='$Last_updated' WHERE Stock_no='$Stock_no'";
        return mysqli_query($db, $sql);
    }


    /**
     * Display all the stocks with their prices and date created and last updated from the database.
     *
     * return the result of the database query.
     */

    public static function displayStock(){
        $session_email = $_SESSION['Email'];
        $db = static::getDB();
        $Email = mysqli_real_escape_string($db,$session_email);
        $sql = "SELECT Stock_no,Stock,Stock_price,Date_created,Last_updated,Email FROM stock_details WHERE Email='$Email'";
        $result = mysqli_query($db, $sql);
        $arr=[];

        while($row = mysqli_fetch_assoc($result)){
					$arr[]=$row;
        }
		return $arr;
    }

}
?>
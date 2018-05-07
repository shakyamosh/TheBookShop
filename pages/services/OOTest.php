<?php

//include_once 'Session.php';
include 'Db_conn.php';

class OOTest {

    private $db_conn;

    public function __construct() {
        $this->db_conn = new Db_conn();
    }

    //User Registration
    public function userRegistration($info) {
        $fname = $info['fname'];
        $lname = $info['lname'];
        $email = $info['email'];
        $password = md5($info['password']);
        //$gender = $info['gender'];
        
        //Checking for invalid values, empty fields and duplicate emails
        $chk_email = $this->checkEmail($email);

        if ($fname == "" OR $lname == "" OR $email == "" OR $password == "") {
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>The field must not be empty.</div>";
            return $msg;
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Email address not valid!</div>";
            return $msg;
        }

        if ($chk_email == true) {
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Email address already exists.</div>";
            return $msg;
        }
        //End checking for invalid values or empty fields
        
        //INSERTING into user table
        $sql = "INSERT INTO user(fname, lname, email, password, gender) VALUES ( :fname, :lname, :email, :password, 'M')";
        $query = $this->db_conn->connection->prepare($sql);
        $query->bindValue(':fname', $fname);
        $query->bindValue(':lname', $lname);
        $query->bindValue(':email', $email);
        $query->bindValue(':password', $password);
        $result = $query->execute();

        //Onsuccess display success msg or on error display error msg
        if ($result) {
            $msg = "<div class='alert alert-success'><strong>Success!! </strong>You've been registered.</div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Problem occured.</div>";
            return $msg;
        }
        //End inserting into the table
    }

    private function checkEmail($email) {
        $sql = "Select email from user where email = :email";
        $query = $this->db_conn->connection->prepare($sql);
        $query->bindValue(':email', $email);
        $query->execute();

        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    //End User Registration

    //User Login
    public function getUserLogin($email, $password) {
        $sql = "Select * from user where email = :email AND password = :password LIMIT 1";
        $query = $this->db_conn->connection->prepare($sql);
        $query->bindValue(':email', $email);
        $query->bindValue(':password', $password);
        $query->execute();

        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function userLogin($info) {
        $email = $info['email'];
        $password = md5($info['password']);

        //Checking for invalid values, empty fields and duplicate emails
        $chk_email = $this->checkEmail($email);

        if ($email == "" OR $password == "") {
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>The field must not be empty.</div>";
            return $msg;
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Email address not valid!</div>";
            return $msg;
        }

        if ($chk_email == false) {
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Email address does not exist.</div>";
            return $msg;
        }
        //End checking for invalid values or empty fields

        $result = $this->getUserLogin($email, $password);
        if ($result) {
            Session::init();
            Session::set("login", true);
            Session::set("user_id", $result->user_id);
            Session::set("fname", $result->fname);
            Session::set("email", $result->email);
            Session::set("user_type", $result->user_type);
            Session::set("loginmsg", "<div class='alert alert-success'><strong>Success!! </strong>Logged In!</div>");
            //header("Location: admin_dash.php");
            if ($result->user_type == 0) {
                header("Location: admin_dash.php");
            } else {
                header("Location: user_dash.php");
            }
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Password incorrect.</div>";
            return $msg;
        }
    }
    //End User Login
        
    //Listing recently joined users from the database in desc order
    public function getUserDetails() {
        $sql = "Select * from user where user_type = 1 order by date_created desc";
        $query = $this->db_conn->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
    //End listing recently joined users from the database
    
    //Listing recent messages in desc order
    public function getFeedback() {
        $sql = "Select * from contact order by msg_date desc";
        $query = $this->db_conn->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
    //End listing recent messages

    //Editing user details
    public function getUserData($userID) {
        $sql = "Select * from user where user_id = :user_id limit 1";
        $query = $this->db_conn->connection->prepare($sql);
        $query->bindValue(':user_id', $userID);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function userUpdate($userID, $info) {
        $fname = $info['fname'];
        $lname = $info['lname'];
        $email = $info['email'];        

        //Checking for invalid values or empty fields        
        if ($fname == "" OR $lname == "" OR $email == "") {
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>The field must not be empty.</div>";
            return $msg;
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Email address not valid!</div>";
            return $msg;
        }        
        //End checking for invalid values or empty fields
        
        //INSERTING into user table
        $sql = "UPDATE user set fname = :fname, lname = :lname, email = :email WHERE user_id = :user_id";
        $query = $this->db_conn->connection->prepare($sql);
        $query->bindValue(':fname', $fname);
        $query->bindValue(':lname', $lname);
        $query->bindValue(':email', $email);
        $query->bindValue(':user_id', $userID);
        $result = $query->execute();

        //Onsuccess display success msg or on error display error msg
        if ($result) {
            $msg = "<div class='alert alert-success'><strong>Success!! </strong>User details updated.</div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Problem occured.</div>";
            return $msg;
        }
        //End inserting into the table
    }
    //End editing details
    
    //Update Password
    private function checkPassword($userID, $old_pass){
        $password = md5($old_pass);
        
        $sql = "Select password from user where user_id = :user_id AND password = :password";
        $query = $this->db_conn->connection->prepare($sql);
        $query->bindValue(':user_id', $userID);
        $query->bindValue(':password', $password);
        $query->execute();

        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function userPassword($userID, $info){
        $old_pass = $info['old_pass'];
        $new_pass = $info['password'];
        
        $checkPass = $this->checkPassword($userID, $old_pass);
        
        if($old_pass == "" OR $new_pass == ""){
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Field should not be empty.</div>";
            return $msg;
        }                
        
        if($checkPass == false){
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Old password does not exist.</div>";
            return $msg;
        }
        
        if(strlen($new_pass) < 6){
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Password too short should be greater than 6 characters.</div>";
            return $msg;
        }
        
        $password = md5($new_pass);
        
        $sql = "UPDATE user set password = :password WHERE user_id = :user_id";
        $query = $this->db_conn->connection->prepare($sql);
        $query->bindValue(':password', $password);        
        $query->bindValue(':user_id', $userID);
        $result = $query->execute();

        //Onsuccess display success msg or on error display error msg
        if ($result) {
            $msg = "<div class='alert alert-success'><strong>Success!! </strong>Password updated.</div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Problem occured.</div>";
            return $msg;
        }
    }
    //End update password
    
    //Displaying books according to categories
    public function getCategory(){        
        $sql = "Select * from book_category";
        $query = $this->db_conn->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;    
    }
    //End displaying books according to categories
    
    //Getting list of all the books
    public function getBooks(){
        $sql = "Select * from book order by entry_date desc";
        $query = $this->db_conn->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;    
    }
    //End getting list of all the books
    
    //Viewing details of the book
    public function getBookData($bookID) {
        $sql = "Select * from book where book_id = :book_id limit 1";
        $query = $this->db_conn->connection->prepare($sql);
        $query->bindValue(':book_id', $bookID);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    //End viewing details of the book
    
    public function delUser($userID){
        $sql = "delete from user where user_id = :user_id";
        $query = $this->db_conn->connection->prepare($sql);
        $query->bindValue(':user_id', $userID);
        $query->execute();
    }
    
    //Deleting Book
    public function delBook($bookID) {
        $sql = "delete from book where book_id = :book_id";
        $query = $this->db_conn->connection->prepare($sql);
        $query->bindValue(':book_id', $bookID);
        $query->execute();        
    }
    //End deleting book
    
    //Contact page
    public function msgSend($info) {
        $name = $info['name'];        
        $email = $info['email'];
        $phone = $info['phone'];
        $cmnt = $info['comment'];
        
        //Checking for invalid values, empty fields and duplicate emails
        if ($name == "" OR $email == "" OR $phone == "" OR $cmnt == "") {
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>The field must not be empty.</div>";
            return $msg;
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Email address not valid!</div>";
            return $msg;
        }
        //End checking for invalid values or empty fields
        
        //INSERTING into user table
        $sql = "INSERT INTO contact(name, email, phone, comment) VALUES ( :name, :email, :phone, :comment)";
        $query = $this->db_conn->connection->prepare($sql);
        $query->bindValue(':name', $name);
        $query->bindValue(':email', $email);
        $query->bindValue(':phone', $phone);        
        $query->bindValue(':comment', $cmnt);
        $result = $query->execute();

        //Onsuccess display success msg or on error display error msg
        if ($result) {
            $msg = "<div class='alert alert-success'><strong>Success!! </strong>Your message has been sent.</div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Message not sent.</div>";
            return $msg;
        }
        //End inserting into the table
    }
    //End contact page
    
    //Upload book
    public function uploadBook($info){
        $isbn = $info['isbn'];
        $category = $info['category'];
        $title = $info['title'];
        $name = $info['name'];        
        $author = $info['author'];
        $publisher = $info['publish'];
        $date = $info['publish_date'];
        $price = $info['price'];
        $format = $info['format'];
        $lang = $info['lang'];
        $desc = $info['desc'];
        $img = $info['pic'];
        
        if ($isbn == "" OR $category == "" OR $title == "" OR $name == "" OR $author == "" OR $publisher == "" OR $date == "" OR $price == "" OR $format == "" OR $lang == "" OR $desc == "") {
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>The field must not be empty.</div>";
            return $msg;
        }
        
        if($img == ""){
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Image not selected.</div>";
            return $msg;
        }else{
//            $path = "image/";
//            $path = $path . basename($_FILES['pic']['name']);
//            if (move_uploaded_file($_FILES['pic']['tmp_name'], $path)) {
//                echo 'ulpoadded';
//            } else {
//                echo "There was an error uploading the file, please try again!";
//            }
        }
        
        $sql = "INSERT INTO book(isbn10, category, title, book_name, author, publisher, publish_date, price, format, language, description, book_cover) VALUES "
                . "( :isbn, :category, :title, :name, :author, :publish, :publish_date, :price, :format, :lang, :desc, :pic)";
        $query = $this->db_conn->connection->prepare($sql);
        $query->bindValue(':isbn', $isbn);
        $query->bindValue(':category', $category);
        $query->bindValue(':title', $title);        
        $query->bindValue(':name', $name);
        $query->bindValue(':author', $author);
        $query->bindValue(':publish', $publisher);
        $query->bindValue(':publish_date', $date);
        $query->bindValue(':price', $price);
        $query->bindValue(':format', $format);
        $query->bindValue(':lang', $lang);
        $query->bindValue(':desc', $desc);
        $query->bindValue(':pic', $img);
        $result = $query->execute();                
        
        if ($result) {
            $msg = "<div class='alert alert-success'><strong>Success!! </strong>Book has been added.</div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-danger'><strong>Error!! </strong>Book not added.</div>";
            return $msg;
        }        
    }    
}


<?php

$connect = mysqli_connect("localhost", "root", "", "TheBookShop");

$data = json_decode(file_get_contents("php://input"));

if (count($data) > 0) {
    $first_name = mysqli_real_escape_string($connect, $data->fname);
    $last_name = mysqli_real_escape_string($connect, $data->lname);
    $email = mysqli_real_escape_string($connect, $data->email);
    $pass = mysqli_real_escape_string($connect, md5($data->pass));
    $dob = $_POST['dob'];
    
    $query = "INSERT INTO user(fname, lname, email, password, gender, dob, user_type) VALUES ('$first_name', '$last_name', '$email', '$pass', 'M', '$dob', 1)";
    if (mysqli_query($connect, $query)) {
        echo "Data Inserted...";
    } else {
        //echo 'Error';
        echo $dob;
    }
}
?>

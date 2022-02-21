<?php
session_start();

// variable declaration
$email = "";
$status = "";
$errors = array();
$_SESSION['success'] = "";

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'makerlab');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $lewisID = mysqli_real_escape_string($db, $_POST['lewisID']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    $user_check_query = "SELECT * FROM users WHERE lewisID='$lewisID' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['lewisID'] === $lewisID) {
            array_push($errors, "lewisID already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "lewisID already exists");
        }
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
        $query = "INSERT INTO users (lewisID,
                                    fname, 
                                    lname, 
                                    email, 
                                    password) 
                    VALUES('$lewisID',
                            '$fname', 
                            '$lname', 
                            '$email',
                            '$password')";
        mysqli_query($db, $query);
        $_SESSION['fname'] = $fname;
        $_SESSION['email'] = $email;
        header('location: pending.php');
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Lewis Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email' 
        AND password='$password'";

        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            
            $row = mysqli_fetch_assoc($results);
            $status = $row['status'];
            $role = $row['role'];
            if ($status == "Pending") { //if user is pending -> pending.php
				$_SESSION['email'] = $email;
                header('location: pending.php');
            } else if ($status == "Active" AND $role == "User") { //if user is active -> active.php
				$_SESSION['email'] = $email;
                header('location: active.php');
            } else if ($status == "Active" AND $role == "Admin") { //if admin is active -> admin.php
				$_SESSION['email'] = $email;
                header('location: admin.php');
            }
        } else {
            array_push($errors, "Email and / or password is incorrect! ");
        }
    }
}
?>
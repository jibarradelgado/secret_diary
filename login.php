<?php

session_start();

if ($_GET['logout']==1 AND $_SESSION['id']) {
    session_destroy();

    $message="You have been logged out";
}

include("connection.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_POST['submit'] == "Sign Up")
{
    if (!$_POST['email']) {
        $error.="<br />Please enter your email";
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error.="<br />Please enter a valid email address";
    }

    if (!$_POST['password']) {
        $error.="<br />Please enter your password";
    } else {
        if (strlen($_POST['password']) < 8) {
            $error.="<br />Please enter a password with at least 8 characters long";
        }
        if (!preg_match('`[A-Z]`', $_POST['password'])) {
            $error.="<br />Please include at least one capital letter";
        }
    }

    if ($error) {
        $error = "There were error(s) in your signup details: <br />" . $error;
    }
    else {

        $sql = "SELECT * FROM users WHERE email='".mysqli_real_escape_string($conn, $_POST['email'])."'";

        $result = $conn->query($sql);

        $results = mysqli_num_rows($result);

        if ($results) {
            $error = "Email address already exists";

            $conn->close();
        }
        else {
            $email = $_POST['email'];
            $password = md5(md5($_POST['email']).$_POST['password']);

            $sql = "INSERT INTO  users (email,  password)
                VALUES ('".mysqli_real_escape_string($conn, $email)."', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";

                $_SESSION['id']=mysqli_insert_id($conn);

                header("Location:mainpage.php");

            } else {
                echo "Error: " . $sql . "<br />" . $conn->error;
            }

            $conn->close();
        }
    }

}

if ($_POST['submit'] == "Log In") {

    $email = $_POST['loginemail'];
    $password = md5(md5($email).$_POST['loginpassword']);

    $sql = "SELECT * FROM users WHERE email='".mysqli_real_escape_string($conn, $email)."' AND password='".$password."' LIMIT 1";

    $result = $conn->query($sql);

    $row = mysqli_fetch_array($result);

    if ($row) {
        $_SESSION['id'] = $row['id'];

        header("Location:mainpage.php");

    } else {
        $error = "We could not find a user with that email and password. Please try again";
    }

    $conn->close();
}

?>
<?php

if ($_SERVER["REQUEST_METHOD"]=== "POST") {
    $signup_name = $_POST["signup_name"];
    $signup_email = $_POST["signup_email"];
    $signup_password = $_POST["signup_password"];

    try {
        require_once 'dbconnect.php';
        require_once'signup_model.inc.php';
        #require_once 'signup_view.inc.php';
        require_once 'signup_contr.inc.php';

        // Error Handlers
        $errors = [];
        if (is_input_empty($signup_name, $signup_email, $signup_password)) {
            $errors["empty_input"] = 'Fill in all fields!';
        } 
        if (is_email_invalid($signup_email)){   
            $errors["invalid_email"] = 'Invalid email!';   
        }
        if (is_username_taken($pdo,$username)) {
            $errors["username_taken"] = 'Username already taken!';
        }
        if (is_email_registered($pdo, $signup_email)) {
            $errors["email_used"] = 'Email already registered!';
        }
        require_once 'config_session.inc.php';
        if($errors) {
            $_SESSION['errors_signup'] = $errors;
            header("Location: ../index.php");
            die();
        }
        
        create_user($pdo, $signup_name, $signup_email, $signup_password);
        header("Location: ../index.php?signup=success");
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
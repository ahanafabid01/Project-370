<?php
declare(strict_types= 1);

function get_username(object $pdo, string $username) {
    $query = "SELECT username FROM user WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_email(object $pdo, string $signup_email) {
    $query = "SELECT signup_email FROM user WHERE email = :signup_email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":signup_email", $signup_email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function set_user(object $pdo, string $signup_name, string $signup_email, string $signup_password) {
    $query = "INSERT INTO user($signup_name, $signup_email, $signup_password) VALUES
    (:signup_name, :signup_email, :signup_password);";
    $stmt = $pdo->prepare($query);

     $options =[
        'cost' => 12
     ];
     $hashedpassword = password_hash($signup_password, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":signup_name", $signup_name);
    $stmt->bindParam(":signup_email", $signup_email);
    $stmt->bindParam(":signup_password", $hashedpassword);
    $stmt->execute();    
}
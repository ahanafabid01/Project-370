<?php
declare(strict_types= 1);

function is_input_empty(string $signup_name, string $signup_email, string $signup_password) {
    if (empty($signup_name) || empty($signup_email) || empty($signup_password)) {
        return true;
        }
        else {
            return false;
        }
}

function is_email_invalid(string $signup_email) {
    if (!filter_var($signup_email, FILTER_VALIDATE_EMAIL)) {
        return true;
        }
        else {
            return false;
        }
}
function is_username_taken(object $pdo,string $username) {
    if (get_username($pdo,$username)) {
        return true;
        }
        else {
            return false;
        }
}
function is_email_registered(object $pdo, string $signup_email) {
    if (get_email($pdo, $signup_email)) {
        return true;
        }
        else {
            return false;
        }
}
function create_user(object $pdo, string $signup_name, string $signup_email, string $signup_password) {
   set_user($pdo, $signup_name, $signup_email, $signup_password);
}
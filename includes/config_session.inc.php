<?php
ini_set("session.use_onl;y_cookies",1);
ini_set("session.use_strict_mode",1);

session_set_cookie_params([
    "lifetime"=> "1800",
    "domain"=> "localhost",
    "path"=> "/",
    "secure"=> True,
    "httponly"=> True,
]);

session_start();

if (!isset($_SESSION["last_regeneration"])) {
    regenerate_sess_id();
} else {
    $interval = 60* 60;
    if (time() - $_SESSION["last_regeneration"] > $interval) {
        regenerate_sess_id();
    }
}

function regenerate_sess_id() {
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time();    
}
<?php //this file enables secure session for logged in users

function secure_session_start(){
    
    $lifetime = 3600;
    $path = "/";
    $domain = "";
    $secure = TRUE;
    $httponly = TRUE;
    session_set_cookie_params($lifetime,$path,$domain,$secure,$httponly);
    
    
    session_start();
}



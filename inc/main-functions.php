<?php
    require_once('config.php');
    require_once('functions/main.php');
    require_once('functions/pages-functions.php');
    if(!$link){header("Location: /inc/install.php");}
 

$fulweburl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";   

$post = getSinglePostDetailsbySlug();






function get_header(){
    global $usersession;
    include(ROOT_DIR.'theme/header.php');
}

function get_sidebar(){
    include(ROOT_DIR.'theme/sidebar.php');
    
}
function get_footer(){
    include(ROOT_DIR.'theme/footer.php');
    
}
function the_navigation(){
    global $usersession;
    include(ROOT_DIR.'theme/other/navigation.php');
    
}
function the_admin_navigation(){
    global $usersession;
    include(ROOT_DIR.'theme/other/admin-navigation.php');
}
function the_user_navigation(){
    global $usersession;
    include(ROOT_DIR.'theme/other/user-navigation.php');
}
function the_content_navigation(){
    global $usersession;
    include(ROOT_DIR.'theme/other/content-navigation.php');
}

function randString($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
    return $randomString; 
} 

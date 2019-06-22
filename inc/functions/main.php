<?php
    
    

/**************************************************
*********  Start Pages Declarate ******************
**************************************************/
    $filelink = array(
        "login",
        "register",
        "logout",
        "404",
        "post-ads",
        "category",
        "account",
        "my-ads",
        "my-pending-ads",
        "administrator"
    );
    $filelinktitle = array(
        "login"=>"Login",
        "register"=>"Register",
        "logout"=>"Log Out",
        "404"=>"404 Page Not Found",
        "post-ads"=>"Post new Ads",
        "account"=>"My Account",
        "my-ads"=>"My Ads",
        "category"=>"Category",
        "my-pending-ads"=>"Pending Ads",
        "administrator"=>"Admin Panel"
    );

    $adminfilelink = array(
        "category",
        "all-ads",
        "pending-ads",
        "users",
        "settings",
        "cities"
    );
    $adminfilelinktitle = array(
        "category"=>"Categories",
        "all-ads"=>"All Ads",
        "pending-ads"=>"Pending Ads",
        "users"=>"Users List",
        "settings"=>"Settings",
        "cities"=>"Cities List"
    );
/**************************************************
************ END Pages Declarate ******************
**************************************************/


function getmainurl(){
    return $mainurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";
}
function get_full_url(){
    $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
    return $link;
}

function makeSlug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug;
}


function getRequireLogin(){
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /login/");
    exit;
    }
}
function getAdminRequireLogin(){
    global $usersession;
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $usersession['type'] !== 'admin' ){
    header("location: /");
    exit;
    }
}
function displayOpt($db,$dbname,$id){
    global $link;
    $sql = "SELECT * FROM $db WHERE id='$id'";
    $result = $link->query($sql);
        while($row = $result->fetch_assoc()) {
            return $row[$dbname];
    }
}

function the_title(){
    global $post,$filelink,$filelinktitle,$adminfilelink,$adminfilelinktitle;
    
    if(isset($_GET['slug'])){
        if(in_array($_GET['slug'], $filelink)){
            echo $filelinktitle[$_GET['slug']];
        }else{
            echo 'Page Not Found';
        }
    }elseif(isset($_GET['adminslug'])){
        if(in_array($_GET['adminslug'], $adminfilelink)){
            echo $adminfilelinktitle[$_GET['adminslug']];
        }else{
            echo 'Page Not Found';
        }
    }elseif(isset($_GET['post'])){
        if($post){
            echo $post['post_title'];
        }else{
            echo 'Page Not Found';
        }
    }else{
        echo getPageOpt('header_title').' '.getPageOpt('header_descriotion');;
    }   
}
function getUserSessionDetails(){
        global $link;
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM users WHERE id='$id'";
        $result = mysqli_query($link, $sql);
        // fetch query results as associative array.
        $usersession = mysqli_fetch_assoc($result);
        return $usersession;
}
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){}else{$usersession = getUserSessionDetails();}

function getNotLogedUserDetails(){
    
}


function countTables($db){
    global $link;
    $result = $link->query("SELECT * FROM $db");
    $num_rows = $result->num_rows;
    return $num_rows; 
}
function countTablesWhere($db,$dbname,$dbvar){
    global $link;
    $result = $link->query("SELECT * FROM $db WHERE $dbname='$dbvar'");
    $num_rows = $result->num_rows;
    return $num_rows; 
}
function countTablesWhereAnd($db,$dbname,$dbvar,$dbname1,$dbvar1){
    global $link;
    $result = $link->query("SELECT * FROM $db WHERE $dbname='$dbvar' AND $dbname1='$dbvar1'");
    $num_rows = $result->num_rows;
    return $num_rows; 
}

function getPageOpt($opt){
    global $link;
    $sql = "SELECT * FROM settings WHERE opt='$opt'";
    $result = $link->query($sql);
        while($row = $result->fetch_assoc()) {
            return $row['value'];
    }
}






function updateDbRow($tableName,$sqloption,$id,$location){
    global $link;
    $sql = "UPDATE $tableName SET $sqloption WHERE id=$id";
    if ($link->query($sql) === TRUE) {
        header("Location: $location");
    }
    
}

function settingsvalue($name){
    global $link;
    $sql = "SELECT value FROM settings WHERE settings_name='$name'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            return $row['settings_var'];
        }
    } 
}
function settingsvalueid($name){
    global $link;
    $sql = "SELECT id FROM settings WHERE opt='$name'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            return $row['id'];
        }
    } 
}




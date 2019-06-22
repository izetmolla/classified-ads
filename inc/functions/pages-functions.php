<?php
/* Update User Details */
function updateUserDetails($type,$fullname,$email,$address,$phone,$password){
    global $link,$usersession;
    $id = $usersession['id'];
    switch ($type) {
        case "update_details":
            $sql = "UPDATE users SET fullname='$fullname', email='$email', address='$address', phone='$phone' WHERE id='$id'";
            if ($link->query($sql) === TRUE) { header("Location: /account/"); }
            break;
        case "blue":
            $sql = "UPDATE users SET password='$password' WHERE id='$id'";
            if ($link->query($sql) === TRUE) { header("Location: /account/"); }
            break;
    }
}

/***********************************************
*********   Users Functions ******************
**********************************************/
function getAdminUsersList(){
    global $link;
    $sql = "SELECT * FROM users WHERE NOT type='admin' ORDER BY id DESC";
    $result = $link->query($sql);
    $resultset  = array(); 
    while($row = $result->fetch_assoc()) {
        $resultset[] = $row;
    }
    return $resultset;
}
function deleteMainUser($id){
    global $link;
    $sql = "DELETE FROM users WHERE id='$id'";
    if ($link->query($sql) === TRUE) {
        header("Location: /administrator/users/");
    }
}




/***********************************************
*********   Categoy Functions ******************
**********************************************/

/* Insert Category */
function insertMainCategory($categoryname,$categoryslug){
    global $link;
    $sql = "INSERT INTO categories (category_name,category_slug,category_type) VALUES ('$categoryname','$categoryslug','main')";
    if ($link->query($sql) === TRUE) {
        header("Location: /administrator/category/");
    }
}
/* Insert Child Category */
function insertChildCategory($categoryname,$categoryslug,$categorychildof){
    global $link;
    $sql = "INSERT INTO categories (category_name,category_slug,category_type,category_child_of) VALUES ('$categoryname','$categoryslug','child','$categorychildof')";
    if ($link->query($sql) === TRUE) { header("Location: /administrator/category/");   }
}
/* Get main Category */
function getMainCategoryList($type,$id){
    global $link;
    $sql = "SELECT * FROM categories WHERE category_type='$type' AND category_child_of='$id' ORDER BY id DESC";
    $result = $link->query($sql);
    $resultset  = array(); 
    while($row = $result->fetch_assoc()) {
        $resultset[] = $row;
    }
    return $resultset;
}
function deleteMainCategory($id){
    global $link;
    $sql = "DELETE FROM categories WHERE id='$id' OR category_child_of='$id'";
    if ($link->query($sql) === TRUE) {
        header("Location: /administrator/category/");
    }
}
function displayCategory($type,$id){
    global $link;
    $sql = "SELECT * FROM categories WHERE id='$id'";
    $result = $link->query($sql);
        while($row = $result->fetch_assoc()) {
            return $row[$type];
    }
}
function getCategoryDetailsBySlug(){
    global $link;
    $slug = $_GET['categoryslug'];
    $sql = "SELECT * FROM categories WHERE category_slug='$slug'";
    $result = mysqli_query($link, $sql);
    // fetch query results as associative array.
    $category = mysqli_fetch_assoc($result);
    return $category;
}

/***********************************************
*********   City  Functions ********************
**********************************************/

/* Insert City */
function insertCity($cityname,$cityslug){
    global $link;
    $sql = "INSERT INTO cities (city_name,city_slug,city_type) VALUES ('$cityname','$cityslug','city')";
    if ($link->query($sql) === TRUE) {
        header("Location: /administrator/cities/");
    }
}
/* Insert Child Category */
function insertAddress($addressname,$addressslug,$addresschildof){
    global $link;
    $sql = "INSERT INTO cities (city_name,city_slug,city_type,city_child_of) VALUES ('$addressname','$addressslug','address','$addresschildof')";
    if ($link->query($sql) === TRUE) { header("Location: /administrator/cities/");   }
}

/* Get Cities */
function getCities($type,$id){
    global $link;
    $sql = "SELECT * FROM cities WHERE city_type='$type' AND city_child_of='$id' ORDER BY id DESC";
    $result = $link->query($sql);
    $resultset  = array(); 
    while($row = $result->fetch_assoc()) {
        $resultset[] = $row;
    }
    return $resultset;
}

function deleteCity($id){
    global $link;
    $sql = "DELETE FROM cities WHERE id='$id' OR city_child_of='$id'";
    if ($link->query($sql) === TRUE) {
        header("Location: /administrator/cities/");
    }
}
function getCityDetailsBySlug(){
    global $link;
    $slug = $_GET['cityslug'];
    $sql = "SELECT * FROM cities WHERE city_slug='$slug'";
    $result = mysqli_query($link, $sql);
    // fetch query results as associative array.
    $category = mysqli_fetch_assoc($result);
    return $category;
}


/***********************************************
*********   Posts Functions ********************
**********************************************/
function getSinglePostDetailsbySlug(){
    global $link;
    if(isset($_GET['post'])){
        $slug = $_GET['post'];
        $sql = "SELECT * FROM posts WHERE post_slug='$slug'";
        $result = mysqli_query($link, $sql);
        // fetch query results as associative array.
        $usersession = mysqli_fetch_assoc($result);
        return $usersession;
    }
}
function getPostBySlug($slug){
    global $link;
    if(isset($slug)){
        $sql = "SELECT * FROM posts WHERE post_slug='$slug'";
        $result = mysqli_query($link, $sql);
        // fetch query results as associative array.
        $usersession = mysqli_fetch_assoc($result);
        return $usersession;
    }
}
function getPostByPostId($postid){
    global $link;
    if(isset($postid)){
        $sql = "SELECT * FROM posts WHERE postid='$postid'";
        $result = mysqli_query($link, $sql);
        // fetch query results as associative array.
        $usersession = mysqli_fetch_assoc($result);
        return $usersession;
    }
}

function insertSinglePost($postid,$post_child_category,$post_city){
    global $link;
    $userid = $_SESSION['id'];
    $sql = "INSERT INTO posts (postid, post_child_category, post_city, post_status, post_slug, post_user)VALUES ('$postid', '$post_child_category', '$post_city','pending','$postid', '$userid')";
    if ($link->query($sql) === TRUE) {
        header("Location: /editpost/$postid/");
    }
}
function updateSinglePost($postid,$post_title,$postslug,$post_category,$post_child_category,$post_address,$post_body,$post_price){
    global $link;
    $sql = "UPDATE posts SET post_title='$post_title', post_slug='$postslug', post_category='$post_category', post_child_category='$post_child_category', post_address='$post_address', post_body='$post_body', post_price='$post_price' WHERE postid='$postid'";
    if ($link->query($sql) === TRUE) {
        header("Location: /editpost/$postid/");
    }  
}

function getUserPostsListAds($type){
    global $link;
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM posts WHERE post_user='$id' AND post_status='$type' ORDER BY id DESC";
    $result = $link->query($sql);
    $resultset  = array(); 
    while($row = $result->fetch_assoc()) {
        $resultset[] = $row;
    }
    return $resultset;
}
function getAdminPostsListAds(){
    global $link;
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM posts ORDER BY id DESC";
    $result = $link->query($sql);
    $resultset  = array(); 
    while($row = $result->fetch_assoc()) {
        $resultset[] = $row;
    }
    return $resultset;
}

function getAdminPostsPendingListAds($status){
    global $link;
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM posts WHERE post_status='$status' ORDER BY id DESC";
    $result = $link->query($sql);
    $resultset  = array(); 
    while($row = $result->fetch_assoc()) {
        $resultset[] = $row;
    }
    return $resultset;
}

function getPostsListType($namevv,$namevar){
    if($namevv == 'main'){$name = 'post_category';}elseif($namevv == 'child'){$name = 'post_child_category';}
    global $link;
    $sql = "SELECT * FROM posts WHERE $name='$namevar' AND post_status='aproved' ORDER BY id DESC";
    $result = $link->query($sql);
    $resultset  = array(); 
    while($row = $result->fetch_assoc()) {
        $resultset[] = $row;
    }
    return $resultset;
}
function getPostsListTypeCity($namevv,$namevar){
    if($namevv == 'city'){$name = 'post_city';}elseif($namevv == 'address'){$name = 'post_address';}
    global $link;
    $sql = "SELECT * FROM posts WHERE $name='$namevar' AND post_status='aproved' ORDER BY id DESC";
    $result = $link->query($sql);
    $resultset  = array(); 
    while($row = $result->fetch_assoc()) {
        $resultset[] = $row;
    }
    return $resultset;
}
function getAprovePost($id){
    global $usersession, $link;
    if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true || $usersession['type'] == 'admin' ){
        $sql = "UPDATE posts SET post_status='aproved' WHERE id='$id'";
        if ($link->query($sql) === TRUE) { header("Location: /administrator/all-ads/"); }
    }
}
function getDeletePost($id){
    global $usersession, $link;
    if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true || $usersession['type'] == 'admin' ){
        $sql = "DELETE FROM posts WHERE id='$id'";
        if ($link->query($sql) === TRUE) { header("Location: /administrator/all-ads/"); }
    }
}

/***************************************
*********   Media Functions ********************
**********************************************/
function uploadImage($mediaid,$randString){
    global $link;
    if(isset($_FILES['image'])){
     $image=$_FILES['image']['name']; 
     $imageArr=explode('.',$image); //first index is file name and second index file type
     $rand=rand(1000000,9999999);
     $newImageName=$randString.$rand.'.'.$imageArr[1];
     $uploadPath=$_SERVER["DOCUMENT_ROOT"]."/uploads/".$newImageName;
     $isUploaded=move_uploaded_file($_FILES["image"]["tmp_name"],$uploadPath);
     if($isUploaded){
         $sql = "INSERT INTO media (media_id, media_url) VALUES ('$mediaid', '$newImageName')";
         if ($link->query($sql) === TRUE) {
             $sql = "UPDATE posts SET post_img='$newImageName' WHERE postid='$mediaid'";
            if ($link->query($sql) === TRUE) { }
         }
         
     }
   }
}

function getMediaNewPostList($mediaid){
    global $link;
    $sql = "SELECT * FROM media WHERE media_id='$mediaid' ORDER BY id DESC LIMIT 8";
    $result = $link->query($sql);
    $resultset  = array(); 
    while($row = $result->fetch_assoc()) {
        $resultset[] = $row;
    }
    return $resultset;
}


/***********************************************
*********   Search Functions ********************
**********************************************/
 function getSearchPostList($keyword){
    global $link;
    $sql = "SELECT * FROM posts WHERE post_title LIKE '%$keyword%' OR post_body LIKE '%$keyword%' ORDER BY id DESC LIMIT 5";
    $result = $link->query($sql);
    $resultset  = array(); 
    while($row = $result->fetch_assoc()) {
        $resultset[] = $row;
    }
    return $resultset;
 }


/***********************************************
*********   Home Functions ********************
**********************************************/
function getHomeCategoryList($limit,$offset){
    global $link;
    $sql = "SELECT * FROM categories WHERE category_type='main' LIMIT $limit OFFSET $offset";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="cat-list">
                                    <h3 class="cat-title"><a href="/category/'.$row['category_slug'].'/">'.$row['category_name'].'<span class="count">(';
            
            echo countTablesWhereAnd('posts','post_category',$row['id'],'post_status','aproved');
            echo ')</span> </a>

                                        <span data-target=".cat-id-1" aria-expanded="true"  data-toggle="collapse"
                                              class="btn-cat-collapsed collapsed">   <span
                                                class=" icon-down-open-big"></span> </span>
                                    </h3>
                                    <ul class="cat-collapse  cat-id-1">';
                                    getSecondCategoryByCate($row['id']);
                                    
                            echo '</ul>
                                </div>';   
        }
    }   
}
function getSecondCategoryByCate($id){
    global $link;
    $sql = "SELECT * FROM categories WHERE category_child_of='$id'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<li><a href="/category/'.$row['category_slug'].'">'.$row['category_name'].'</a>(';
             echo countTablesWhereAnd('posts','post_child_category',$row['id'],'post_status','aproved');
            echo ')</li>';
        }
    }
}

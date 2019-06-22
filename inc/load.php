<?php 
        session_start();
        require_once('main-functions.php');
    if(isset($_GET['slug'])){
        if(in_array($_GET['slug'], $filelink)){
            include(ROOT_DIR.'theme/'. $_GET['slug'] . '.php');
        }else{
            include(ROOT_DIR.'theme/404.php');
        }
    }elseif(isset($_GET['adminslug'])){
        if(in_array($_GET['adminslug'], $adminfilelink)){
            include(ROOT_DIR.'theme/administrator/'. $_GET['adminslug'] . '.php');
        }else{
            include(ROOT_DIR.'theme/404.php');
        }
    }elseif(isset($_GET['post'])){
        global $post;
        if($post){
           include(ROOT_DIR.'theme/post.php'); 
        }else{
            include(ROOT_DIR.'theme/404.php');
        }
    }elseif(isset($_GET['categoryslug'])){
        $catdetail = getCategoryDetailsBySlug();
        global $post;
        if($catdetail){
           include(ROOT_DIR.'theme/category.php'); 
        }else{
            include(ROOT_DIR.'theme/404.php');
        }
    }elseif(isset($_GET['cityslug'])){
        $citydetail = getCityDetailsBySlug();
        global $post;
        if($citydetail){
           include(ROOT_DIR.'theme/city.php'); 
        }else{
            include(ROOT_DIR.'theme/404.php');
        }
    }elseif(isset($_GET['editpost'])){
        $post =  getPostByPostId($_GET['editpost']);
        if($post){
           include(ROOT_DIR.'theme/editor/editpost.php'); 
        }else{
            include(ROOT_DIR.'theme/404.php');
        }
    }else{
        include(ROOT_DIR.'theme/index.php');
    }
?>
<?php
        getAdminRequireLogin();
        get_header();

?>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <?php the_admin_navigation(); ?>
            <div class="col-md-9 page-content col-thin-left">
                <div class="inner-box">
                    <h2><a href="/administrator/users/">New User - (<?php echo countTablesWhere('users','type',''); ?>)</a></h2><br>
                    <h2><a href="/administrator/pending-ads/">New Pending Posts - (<?php echo countTablesWhere('posts','post_status','pending'); ?>)</a></h2><br>
                </div>
                <!--/.page-content-->
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
<?php get_footer(); ?>
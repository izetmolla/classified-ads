<?php
    getRequireLogin();
    get_header();



if(isset($_POST['update_details'])){
    updateUserDetails('update_details',$_POST['fullname'],$_POST['email'],$_POST['address'],$_POST['phone'],'');
}

?>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <?php the_user_navigation(); ?>
                <!--/.page-sidebar-->

                <div class="col-md-9 page-content">
                    <div class="inner-box">
                        <div class="row">
                            <div class="col-md-5 col-xs-4 col-xxs-12">
                                <h3 class="no-padding text-center-480 useradmin"><a href="#">
                                    <img class="userImg" src="/images/user.jpg" alt="user"><?php echo $usersession['fullname']; ?></a></h3>
                            </div>
                            <div class="col-md-7 col-xs-8 col-xxs-12">
                                <div class="header-data text-center-xs">
                                    <!-- revenue data -->
                                    <div class="hdata">
                                        <div class="mcol-left">
                                            <!-- Icon with green background -->
                                            <i class="icon-th-thumb ln-shadow"></i></div>
                                        <div class="mcol-right">
                                            <!-- Number of visitors -->
                                            <p><a href="/my-ads/"><?php echo countTablesWhere('posts','post_user',$_SESSION['id']); ?></a><em>Ads</em></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="inner-box">
                        <div class="welcome-msg">
                            <h3 class="page-sub-header2 clearfix no-padding">Hello <?php echo $usersession['fullname']; ?></h3>
                            <span class="page-sub-header-sub small">You last logged in at: <?php echo $usersession['lastlogin']; ?></span>
                        </div>
                        <div id="accordion" class="panel-group">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h4 class="card-title"><a href="#collapseB1" aria-expanded="true"  data-toggle="collapse" > My details </a></h4>
                                </div>
                                <div class="panel-collapse collapse show" id="collapseB1">
                                    <div class="card-body">
                                        <form class="form-horizontal" action="<?php echo get_full_url(); ?>" method="POST">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Full Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Jhon" name="fullname" value="<?php echo $usersession['fullname']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Email</label>

                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" placeholder="demo@example.com" name="email" value="<?php echo $usersession['email']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Address</label>

                                                <div class="col-sm-9">
                                                    <textarea row="4" class="form-control" name="address"><?php echo $usersession['address']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Phone" class="col-sm-3 control-label">Phone</label>

                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="Phone" placeholder="880 124 9820"  name="phone" value="<?php echo $usersession['phone']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" name="update_details" class="btn btn-default">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/.row-box End-->

                    </div>
                </div>
                <!--/.page-content-->
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!-- /.main-container -->
<?php get_footer(); ?>
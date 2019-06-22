<?php

if(isset($_POST['update_details'])){
    updateDbRow("settings","value='".$_POST['header_title']."'",settingsvalueid('header_title'),get_full_url());
    updateDbRow("settings","value='".$_POST['page_number']."'",settingsvalueid('page_number'),get_full_url());
    updateDbRow("settings","value='".$_POST['home_footer_message']."'",settingsvalueid('home_footer_message'),get_full_url());
    updateDbRow("settings","value='".$_POST['header_descriotion']."'",settingsvalueid('header_descriotion'),get_full_url());
}
    getAdminRequireLogin();
    get_header();



?>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <?php the_user_navigation(); ?>
                <!--/.page-sidebar-->

                <div class="col-md-9 page-content">
                    <div class="inner-box">
                        <div id="accordion" class="panel-group">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h4 class="card-title"><a href="#collapseB1" aria-expanded="true"  data-toggle="collapse" > Website Details </a></h4>
                                </div>
                                <div class="panel-collapse collapse show" id="collapseB1">
                                    <div class="card-body">
                                        <form class="form-horizontal" action="<?php echo get_full_url(); ?>" method="POST">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Website Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Title" name="header_title" value="<?php echo getPageOpt('header_title'); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Website Description</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Description" name="header_descriotion" value="<?php echo getPageOpt('header_descriotion'); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Footer Description</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Description" name="home_footer_message" value="<?php echo getPageOpt('home_footer_message'); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Website Number</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" placeholder="Description" name="page_number" value="<?php echo getPageOpt('page_number'); ?>">
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
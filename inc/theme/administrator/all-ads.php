<?php
        getAdminRequireLogin();
        get_header();
if(isset($_POST['aprove'])){
    getAprovePost($_POST['aprove']);
}
if(isset($_POST['deletePost'])){
    getDeletePost($_POST['deletePost']);
}
?>

    <div class="main-container">
        <div class="container">
            <div class="row">
                <?php the_admin_navigation(); ?>
                <div class="col-md-9 page-content">
                    <div class="inner-box">
                        <h2 class="title-2"><i class="icon-docs"></i> All Ads </h2>

                        <div class="table-responsive">
                            <table id="addManageTable"
                                   class="table table-striped table-bordered add-manage-table table demo"
                                   data-filter="#filter" data-filter-text-only="true">
                                <thead>
                                <tr>
                                    <th> Photo</th>
                                    <th data-sort-ignore="true"> Adds Details</th>
                                    <th data-type="numeric"> Price</th>
                                    <th data-type="numeric"> User</th>
                                    <th data-type="numeric">Status</th>
                                    <th> Option</th>
                                </tr>
                                </thead>
                            <form method="POST" action="<?php echo get_full_url(); ?>">
                                <tbody>
                            <?php $postads = getAdminPostsListAds(); foreach($postads as $postad): ?>
                                <tr>
                                    <td style="width:10%" class="add-img-td"><a href="/post/<?php echo $postad['post_slug']; ?>/" target="_blank"><img
                                            class="thumbnail  img-responsive"
                                            src="<?php if(!$postad['post_img']){echo '/assets/img/noimg.png';}else{echo '/uploads/'.$postad['post_img'];} ?>"
                                            alt="img"></a></td>
                                    <td style="width:30%" class="ads-details-td">
                                        <div>
                                            <p><strong> <a href="/post/<?php echo $postad['post_slug']; ?>/" target="_blank" title="<?php echo $postad['post_title']; ?>"><?php echo $postad['post_title']; ?></a> </strong></p>
                                            <p><strong> Posted On </strong>:
                                                <?php echo $postad['post_date']; ?> </p>
                                            <p><strong>City </strong>: <?php echo displayOpt('cities','city_name',$postad['post_city']); ?> <strong>Address:</strong> <?php echo displayOpt('cities','city_name',$postad['post_address']); ?>
                                            </p>
                                        </div>
                                    </td>
                                    <td style="width:10%" class="price-td">
                                        <div><strong> $<?php echo $postad['post_price']; ?></strong></div>
                                    </td>
                                    <td style="width:16%" class="price-td">
                                        <div><strong><?php echo displayOpt('users','username',$postad['post_user']); ?></strong></div>
                                    </td>
                                    <td style="width:16%" class="price-td">
                                        <div><button type="submit" value="<?php echo $postad['id']; ?>" name="aprove"><?php echo $postad['post_status']; ?></button></div>
                                    </td>
                                    <td style="width:10%" class="action-td">
                                        <div>
                                            <p><a href="/editpost/<?php echo $postad['postid']; ?>/" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Edit </a>
                                            </p>


                                            <p><button name="deletePost" value="<?php echo $postad['id']; ?>" class="btn btn-danger btn-sm"><i class=" fa fa-trash"></i> Delete
                                            </button></p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                </tbody>
                            </form>
                            </table>
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
<?php get_header(); ?>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
                <?php the_content_navigation(); ?>
                <!--/.page-side-bar-->
                <div class="col-md-9 page-content col-thin-left">
                    <div class="category-list ">
                    <div class="tab-content">
                        <div class="adds-wrapper row no-margin">
                        <?php $postdetails = getPostsListTypeCity($citydetail['city_type'],$citydetail['id']); ?>
                           <?php if(!$postdetails){echo '<div class="text-center" style="padding:20px;text-align:center;">No Post Found</div>';} ?>
                            <?php foreach($postdetails as $post): ?>
                            <div class="item-list">
                                <div class="row"><div class="col-md-2 no-padding photobox">
                                    <div class="add-image"><span class="photo-count"><i
                                            class="fa fa-camera"></i> 2 </span> <a href="/post/<?php echo $post['post_slug']; ?>/">
                                        <img class="thumbnail no-margin" src="<?php if(!$post['post_img']){echo '/assets/img/noimg.png';}else{echo '/uploads/'.$post['post_img'];} ?>"
                                            alt="img"></a></div>
                                </div>
                                    <!--/.photobox-->
                                    <div class="col-sm-7 add-desc-box">
                                        <div class="ads-details">
                                            <h5 class="add-title"><a href="/post/<?php echo $post['post_slug']; ?>/"><?php echo $post['post_title']; ?></a></h5>
                                            <span class="info-row">
                                                <span class="date"><i class=" icon-clock"></i> <?php echo $post['post_date']; ?> </span>- 
                                                <span class="item-location"><i class="fa fa-map-marker-alt"></i> <?php echo displayOpt('cities','city_name',$post['post_city']); ?>, <?php echo displayOpt('cities','city_name',$post['post_address']); ?> </span> 
                                            </span>
                                        </div>
                                    </div>
                                    <!--/.add-desc-box-->
                                    <div class="col-md-3 text-right  price-box">
                                        <h2 class="item-price"><?php echo $post['post_price']; ?></h2>
                                        <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span>
                                        </a></div>
                                    <!--/.add-desc-box-->
                                </div>
                            </div>
                            <!--/.item-list-->
                        <?php endforeach; ?>
                        </div>
                    </div>
                    </div>

                    <div class="post-promo text-center">
                        <h2> Do you get anything for sell ? </h2>
                        <h5>Sell your products online FOR FREE. It's easier than you think !</h5>
                        <a href="/post-ads/" class="btn btn-lg btn-border btn-post btn-danger">Post a Free Ad </a>
                    </div>
                    <!--/.post-promo-->
                </div>
                <!--/.page-content-->

            </div>
        </div>
    </div>
<?php get_footer(); ?>
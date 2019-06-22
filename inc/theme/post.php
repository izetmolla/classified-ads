<?php get_header(); ?>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content col-thin-right">
                    <div class="inner inner-box ads-details-wrapper">
                        <h2> <?php echo $post['post_title']; ?>
                        </h2>
                        <span class="info-row"> <span class="date"><i class=" icon-clock"> </i> <?php echo $post['post_date']; ?> </span> - <span
                                class="category"><?php echo displayOpt('categories','category_name',$post['post_category']); ?> </span>- <span class="item-location"><i
                                class="fa fa-map-marker-alt"></i> <?php echo displayOpt('cities','city_name',$post['post_city']); ?> </span> </span>
                    <?php if($post['post_img']){?>
                        <div class="ads-image">
                            <h1 class="pricetag"> $<?php echo $post['post_price']; ?></h1>
                            <ul class="bxslider">
                            <?php $medias = getMediaNewPostList($post['postid']); foreach($medias as $media): ?>
                                <li><img src="/uploads/<?php echo $media['media_url']; ?>" alt="img"/></li>
                            <?php endforeach; ?> 
                            </ul>
                            <div id="bx-pager">
                            <?php $medias = getMediaNewPostList($post['postid']); foreach($medias as $media): ?>
                                <a class="thumb-item-link" data-slide-index="0" href="#"><img
                                        src="/uploads/<?php echo $media['media_url']; ?>" alt="img"/></a>
                            <?php endforeach; ?>
                            </div>
                        </div>
                        <!--ads-image-->
                    <?php } ?>
                        <div class="Ads-Details">
                            <h5 class="list-title"><strong>Ads Detsils</strong></h5>

                            <div class="row">
                                <div class="ads-details-info col-md-8">
                                    <p><?php echo $post['post_body']; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <aside class="panel panel-body panel-details">
                                        <ul>
                                            <li>
                                                <p class=" no-margin "><strong>Price:</strong>$ <?php echo $post['post_price']; ?></p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong>Type:</strong><?php echo displayOpt('categories','category_name',$post['post_child_category']); ?></p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong>Location:</strong> <?php echo displayOpt('cities','city_name',$post['post_address']); ?> </p>
                                            </li>
                                        </ul>
                                    </aside>
                                    <div class="ads-action">
                                        <ul class="list-border">
                                            <li><a href="#"> <i class=" fa fa-user"></i> More ads by User </a></li>
                                            <li><a href="#"> <i class="fa fa-share-alt"></i> Share ad </a></li>
                                            <li><a href="#reportAdvertiser" data-toggle="modal"> <i
                                                    class="fa icon-info-circled-alt"></i> Report abuse </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="content-footer text-left"><a class="btn  btn-default" data-toggle="modal"
                                                                     href="mail:<?php echo displayOpt('users','email',$post['post_user']); ?>"><i
                                    class=" icon-mail-2"></i> Send a message </a> <a href="cel:<?php echo displayOpt('users','phone',$post['post_user']); ?>" class="btn  btn-info"><i
                                    class=" icon-phone-1"></i><?php echo displayOpt('users','phone',$post['post_user']); ?> </a></div>
                        </div>
                    </div>
                    <!--/.ads-details-wrapper-->

                </div>
                <!--/.page-content-->

                <div class="col-md-3  page-sidebar-right">
                    <aside>

                        <div class="card card-user-info sidebar-card">
                            <div class="block-cell user">

                                <div class="cell-media"><img src="/assets/img/user.jpg" alt=""></div>
                                <div class="cell-content">
                                    <h5 class="title">Posted by</h5>
                                    <span class="name"><a href="seller-profile.html"><?php echo displayOpt('users','username',$post['post_user']); ?></a></span>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body text-left">
                                    <div class="grid-col">
                                        <div class="col from">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>Location</span>
                                        </div>
                                        <div class="col to">
                                                <span><?php echo displayOpt('users','user_city',$post['post_user']); ?></span>
                                        </div>
                                    </div>

                                    <div class="grid-col">
                                        <div class="col from">
                                            <i class="fas fa-user"></i>
                                            <span>Joined</span>
                                        </div>
                                        <div class="col to">
                                            <span><?php echo displayOpt('users','created_at',$post['post_user']); ?></span>
                                        </div>
                                    </div>

                                    <div class="grid-col">
                                        <div class="col from">
                                            <i class="fas fa-clock"></i>
                                            <span>Last Login</span>
                                        </div>
                                        <div class="col to">
                                            <span><?php echo displayOpt('users','lastlogin',$post['post_user']); ?></span>
                                        </div>
                                    </div>

                                </div>

                                <div class="ev-action">
                                    <a class="btn btn-success btn-block" data-toggle="modal" href="#contactAdvertiser">
                                        <i class=" icon-mail-2"></i> Contact User
                                    </a>
                                    <a  href="cel:<?php echo displayOpt('users','phone',$post['post_user']); ?>"class="btn  btn-info btn-block">
                                        <i class=" icon-phone-1"></i> <?php echo displayOpt('users','phone',$post['post_user']); ?></a>
                                </div>

                            </div>
                        </div>

                        <div class="card sidebar-card">
                            <div class="card-header">Safety Tips for Buyers</div>
                            <div class="card-content">
                                <div class="card-body text-left">
                                    <ul class="list-check">
                                        <li>Meet seller at a public place</li>
                                        <li>Check the item before you buy</li>
                                        <li>Pay only after collecting the item</li>
                                    </ul>
                                    <p><a class="float-right" href="#"> Know more <i
                                            class="fa fa-angle-double-right"></i> </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--/.categories-list-->
                    </aside>
                </div>
                <!--/.page-side-bar-->
            </div>
        </div>
    </div>
    <!-- /.main-container -->

<?php get_footer(); ?>
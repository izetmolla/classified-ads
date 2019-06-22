<?php get_header();


?>
    <div class="intro" style="background-image: url(assets/img/bg3.jpg);">
        <div class="dtable hw100">
            <div class="dtable-cell hw100">
                <div class="container text-center">
                    <h1 class="intro-title animated fadeInDown"> Find Classified Ads </h1>

                    <p class="sub animateme fittext3 animated fadeIn">
                        Find local classified ads on bootclassified in Minutes
                    </p>

                        <form method="GET" action="/search.php" class="row search-row animated fadeInUp">
                            <div class="col-xl-8 col-sm-8 search-col relative"><i class="icon-docs icon-append"></i>
                                <input type="text" name="keyword" class="form-control has-icon" placeholder="I'm looking for a ..." value="">
                            </div>
                            <div class="col-xl-4 col-sm-4 search-col">
                                <button type="submit" class="btn btn-primary btn-search btn-block btn-gradient"><i class="icon-search"></i> <strong>Find</strong></button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.intro -->

    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content col-thin-right">
                    <div class="inner-box category-content">
                        <h2 class="title-2">Find Classified Ads World Wide </h2>

                        <div class="row">
                            <div class="col-md-4 col-sm-4 ">
                                <?php getHomeCategoryList('2','0'); ?>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <?php getHomeCategoryList('2','2'); ?>
                            </div>
                            <div class="col-md-4 col-sm-4   last-column">
                                <?php getHomeCategoryList('2','4'); ?>
                            </div>
                        </div>
                    </div>

                   
                </div>
                <div class="col-md-3 page-sidebar col-thin-left">
                    <aside>
                        <div class="inner-box">
                            <h2 class="title-2">Popular Cities </h2>
                            <div class="inner-box-content">
                                <ul class="cat-list arrow">
                                    <?php $cities = getCities('city','0'); foreach($cities as $city): ?> 
                                        <li><a href="/city/<?php echo $city['city_slug']; ?>/"> <?php echo $city['city_name']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- /.main-container -->

    <div class="page-info hasOverly" style="background: url(assets/img/bg.jpg); background-size:cover">
        <div class="bg-overly">
            <div class="container text-center section-promo">
                <div class="row">
                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-group"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span><?php echo countTables('users'); ?></span></h5>

                                    <div class="iconbox-wrap-text">Users</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-th-large-1"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span><?php echo countTables('categories'); ?></span></h5>

                                    <div class="iconbox-wrap-text">Categories</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6  col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-map"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span><?php echo countTables('cities'); ?></span></h5>

                                    <div class="iconbox-wrap-text">Location</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon icon-facebook"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span><?php echo countTables('posts'); ?></span></h5>

                                    <div class="iconbox-wrap-text">Posts</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- /.page-info -->

    <div class="page-bottom-info">
        <div class="page-bottom-info-inner">

            <div class="page-bottom-info-content text-center">
                <h1><?php echo getPageOpt('home_footer_message'); ?> <?php echo getPageOpt('page_number'); ?></h1>
                <a class="btn  btn-lg btn-primary-dark" href="tel:+<?php echo getPageOpt('page_number'); ?>">
                    <i class="icon-mobile"></i> <span class="hide-xs color50">Call Now:</span> <?php echo getPageOpt('page_number'); ?> </a>
            </div>

        </div>
    </div>
<?php get_footer(); ?>

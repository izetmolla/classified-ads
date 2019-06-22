<?php
        session_start();
        require_once('main-functions.php');
 get_header(); ?>

    <div class="main-container">
        <div class="container">
            <div class="row">
                <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
                <div class="col-md-3 page-sidebar mobile-filter-sidebar">
                    <aside>
                        <div class="sidebar-modern-inner">
                            <div class="block-title has-arrow sidebar-header">
                                <h5><a href="#">All Categories</a></h5>
                            </div>
                            <div class="block-content categories-list  list-filter ">
                                <ul class=" list-unstyled">
                                    <li><a href="sub-category-sub-location.html"><span class="title">Electronics</span><span class="count">&nbsp;8626</span></a>
                                    </li>
                                    <li><a href="sub-category-sub-location.html"><span class="title">Automobiles </span><span class="count">&nbsp;123</span></a></li>
                                    <li><a href="sub-category-sub-location.html"><span class="title">Property </span><span class="count">&nbsp;742</span></a></li>
                                    <li><a href="sub-category-sub-location.html"><span class="title">Services </span><span class="count">&nbsp;8525</span></a></li>
                                    <li><a href="sub-category-sub-location.html"><span class="title">For Sale </span><span class="count">&nbsp;357</span></a></li>
                                    <li><a href="sub-category-sub-location.html"><span class="title">Learning </span><span class="count">&nbsp;3576</span></a></li>
                                    <li><a href="sub-category-sub-location.html"><span class="title">Jobs </span><span class="count">&nbsp;453</span></a></li>
                                    <li><a href="sub-category-sub-location.html"><span class="title">Cars &amp; Vehicles</span><span class="count">&nbsp;801</span></a>
                                    </li>
                                    <li><a href="sub-category-sub-location.html"><span class="title">Other</span><span class="count">&nbsp;9803</span></a></li>
                                </ul>
                            </div>  <!--/.categories-list-->

                            <div class="block-title has-arrow ">
                                <h5><a href="#">Location</a></h5>
                            </div>
                            <div class="block-content locations-list  list-filter ">
                                <ul class="browse-list list-unstyled long-list">
                                    <li><a href="sub-category-sub-location.html"> Atlanta </a></li>
                                    <li><a href="sub-category-sub-location.html"> Wichita </a></li>
                                    <li><a href="sub-category-sub-location.html"> Anchorage </a></li>
                                    <li><a href="sub-category-sub-location.html"> Dallas </a></li>
                                    <li><a href="sub-category-sub-location.html">New York </a></li>
                                    <li><a href="sub-category-sub-location.html"> Santa Ana/Anaheim </a></li>
                                    <li><a href="sub-category-sub-location.html"> Miami </a></li>
                                    <li><a href="sub-category-sub-location.html"> Virginia Beach </a></li>
                                    <li><a href="sub-category-sub-location.html"> San Diego </a></li>
                                    <li><a href="sub-category-sub-location.html"> Boston </a></li>
                                    <li><a href="sub-category-sub-location.html"> Houston </a></li>
                                    <li><a href="sub-category-sub-location.html">Salt Lake City </a></li>
                                    <li><a href="sub-category-sub-location.html"> Other Locations </a></li>
                                </ul>
                            </div>
                            <!--/.locations-list-->

                            <div class="block-title has-arrow">
                                <h5><a href="#">Price range</a></h5>
                            </div>
                            <div class="block-content categories-list  list-filter ">

                                <form role="form" class="form-inline ">
                                    <div class="form-group col-lg-4 col-md-12 no-padding">
                                        <input type="text" placeholder="$ 2000 " id="minPrice" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-1 col-md-12 no-padding text-center hidden-md"> -</div>
                                    <div class="form-group col-lg-4 col-md-12 no-padding">
                                        <input type="text" placeholder="$ 3000 " id="maxPrice" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-12 no-padding">
                                        <button class="btn btn-default pull-right btn-block-md" type="submit">GO
                                        </button>
                                    </div>
                                </form>
                                <div style="clear:both"></div>
                            </div>
                            <!--/.list-filter-->
                            <div class="block-title has-arrow">
                                <h5><a href="#">Seller </a></h5>
                            </div>
                            <div class="block-content categories-list  list-filter ">
                                <ul class="browse-list list-unstyled ">
                                    <li><a href="sub-category-sub-location.html"><strong>All Ads</strong> <span class="count">228,705</span></a></li>
                                    <li><a href="sub-category-sub-location.html">Business <span class="count">28,705</span></a></li>
                                    <li><a href="sub-category-sub-location.html">Private <span class="count">18,705</span></a></li>
                                </ul>
                            </div>
                            <!--/.list-filter-->

                            <div class="block-title has-arrow">
                                <h5><a href="#">Condition</a></h5>
                            </div>
                            <div class="block-content categories-list  list-filter ">
                                <ul class="browse-list list-unstyled ">
                                    <li><a href="sub-category-sub-location.html">New <span class="count">228,705</span></a>
                                    </li>
                                    <li><a href="sub-category-sub-location.html">Used <span class="count">28,705</span></a>
                                    </li>
                                    <li><a href="sub-category-sub-location.html">None </a></li>
                                </ul>
                            </div>
                            <!--/.list-filter-->
                            <div style="clear:both"></div>
                        </div>



                        <!--/.categories-list-->
                    </aside>
                </div>
                <!--/.page-side-bar-->
                <div class="col-md-9 page-content col-thin-left">

                    <div class="category-list ">
                    <div class="tab-content">
                        <div class="adds-wrapper row no-margin">
                        <?php $postsearchs = getSearchPostList($_GET['keyword']); 
                            if(!$postsearchs){echo '<center><h1>No Resultat for "'.$_GET['keyword'].'"</h1></center>';}
                            ?>
                            
                            <?php foreach($postsearchs as $post): ?>
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

                    <div class="pagination-bar text-center">
                    	<nav aria-label="Page navigation " class="d-inline-b">
                    		<ul class="pagination">

                    			<li class="page-item active"><a class="page-link" href="#">1</a></li>
                    			<li class="page-item"><a class="page-link" href="#">2</a></li>
                    			<li class="page-item"><a class="page-link" href="#">3</a></li>
                    			<li class="page-item"><a class="page-link" href="#">4</a></li>
                    			<li class="page-item"><a class="page-link" href="#">...</a></li>
                    			<li class="page-item">
                    				<a class="page-link" href="#">Next</a>
                    			</li>
                    		</ul>
                    	</nav>
                    </div>
                    <!--/.pagination-bar -->

                    <div class="post-promo text-center">
                        <h2> Do you get anything for sell ? </h2>
                        <h5>Sell your products online FOR FREE. It's easier than you think !</h5>
                        <a href="post-ads.html" class="btn btn-lg btn-border btn-post btn-danger">Post a Free Ad </a>
                    </div>
                    <!--/.post-promo-->
                </div>
                <!--/.page-content-->

            </div>
        </div>
    </div>
<?php get_footer(); ?>
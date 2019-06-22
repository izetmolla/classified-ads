               <div class="col-md-3 page-sidebar mobile-filter-sidebar">
                    <aside>
                        <div class="sidebar-modern-inner">
                            <div class="block-title has-arrow ">
                                <h5><a href="#">All Categories</a></h5>
                            </div>
                            <div class="block-content locations-list  list-filter ">
                                <ul class="browse-list list-unstyled long-list">
                                    <?php $categories =  getMainCategoryList('main','0'); foreach($categories as $category): ?> 
                                        <li><a href="/category/<?php echo $category['category_slug']; ?>/"><?php echo $category['category_name']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <!--/.locations-list-->

                            <div class="block-title has-arrow ">
                                <h5><a href="#">Location</a></h5>
                            </div>
                            <div class="block-content locations-list  list-filter ">
                                <ul class="browse-list list-unstyled long-list">
                                    <?php $cities = getCities('city','0'); foreach($cities as $city): ?> 
                                        <li><a href="/city/<?php echo $city['city_slug']; ?>/"><?php echo $city['city_name']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <!--/.locations-list-->
                            <div style="clear:both"></div>
                        </div>
                        <!--/.categories-list-->
                    </aside>
                </div>
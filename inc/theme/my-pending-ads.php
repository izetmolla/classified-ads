<?php
    getRequireLogin();
    get_header(); ?>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <?php the_user_navigation(); ?>
                <div class="col-md-9 page-content">
                    <div class="inner-box">
                        <h2 class="title-2"><i class="icon-docs"></i> My Ads </h2>

                        <div class="table-responsive">
                            <table id="addManageTable"
                                   class="table table-striped table-bordered add-manage-table table demo"
                                   data-filter="#filter" data-filter-text-only="true">
                                <thead>
                                <tr class="forma-table">
                                    <th data-type="numeric" data-sort-initial="true"></th>
                                    <th> Photo</th>
                                    <th data-sort-ignore="true"> Adds Details</th>
                                    <th data-type="numeric"> Price</th>
                                    <th> Option</th>
                                </tr>
                                </thead>
                                <tbody>
                            <?php $postads = getUserPostsListAds('pending'); 
                                    if(!$postads){echo '<style>.forma-table{display:none;}</style><center><h1>No Pending Post Yet </h1></center>';}
                                    foreach($postads as $postad): ?>
                                <tr>
                                    <td style="width:2%" class="add-img-selector">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </td>
                                    <td style="width:14%" class="add-img-td"><a href="ads-details.html"><img
                                            class="thumbnail  img-responsive"
                                            src="images/item/12.jpg"
                                            alt="img"></a></td>
                                    <td style="width:58%" class="ads-details-td">
                                        <div>
                                            <p><strong> <a href="ads-details.html" title="Brand New Nexus 4">Brand New
                                                Nexus 4</a> </strong></p>

                                            <p><strong> Posted On </strong>:
                                                02-Oct-2014, 04:38 PM </p>

                                            <p><strong>Visitors </strong>: 221 <strong>Located In:</strong> New York
                                            </p>
                                        </div>
                                    </td>
                                    <td style="width:16%" class="price-td">
                                        <div><strong> $199</strong></div>
                                    </td>
                                    <td style="width:10%" class="action-td">
                                        <div>
                                            <p><a class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Edit </a>
                                            </p>

                                            <p><a class="btn btn-info btn-sm"> <i class="fa fa-mail-forward"></i> Share
                                            </a></p>

                                            <p><a class="btn btn-danger btn-sm"> <i class=" fa fa-trash"></i> Delete
                                            </a></p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                </tbody>
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
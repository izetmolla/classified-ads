<?php 
getRequireLogin();
$postid = randString(5);
get_header();

if(isset($_POST['insertPost'])){
    insertSinglePost($postid,$_POST['main-category'],$_POST['main-city']);
    echo $_POST['main-city'];
}
?>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content">
                    <div class="inner-box category-content">
                        <h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Post a Free Classified
                            Ad</strong></h2>

                        <div class="row">
                            <div class="col-sm-12">

                                <form class="form-horizontal" method="POST" action="<?php echo get_full_url(); ?>">
                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Category</label>
                                        <div class="col-sm-8">
                                            <select name="main-category" id="category-group" class="form-control" required>
                                                <option  selected="selected" value=""> Select a category...</option>
                                            <?php $categorymains = getMainCategoryList('main','0'); foreach($categorymains as $catmain): ?>     
                                               <option value="<?php echo $catmain['id']; ?>"
                                                        style="background-color:#E9E9E9;font-weight:bold;"
                                                        disabled="disabled"> - <?php echo $catmain['category_name']; ?> -
                                                </option>
                                                <?php $categorychilds = getMainCategoryList('child',$catmain['id']); foreach($categorychilds as $catchild): ?> 
                                                <option value="<?php echo $catchild['id']; ?>"><?php echo $catchild['category_name']; ?></option>
                                                <?php endforeach; ?>
                                                
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">City</label>
                                        <div class="col-sm-8">
                                            <select name="main-city" id="category-group" class="form-control" required>
                                                <option  selected="selected" value=""> Select a City...</option>
                                            <?php $cities = getCities('city','0'); foreach($cities as $city): ?> 
                                                <option value="<?php echo $city['id']; ?>"><?php echo $city['city_name']; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    

                                    <!-- Button  -->
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <button type="submit" name="insertPost" class="btn btn-success btn-lg">Submit</button>
                                        </div>
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.page-content -->

                <div class="col-md-3 reg-sidebar">
                    <div class="reg-sidebar-inner text-center">
                        <div class="promo-text-box"><i class=" icon-picture fa fa-4x icon-color-1"></i>

                            <h3><strong>Post a Free Classified</strong></h3>

                            <p> Post your free online classified ads with us. Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. </p>
                        </div>

                        <div class="card sidebar-card">
                            <div class="card-header uppercase">
                                <small><strong>How to sell quickly?</strong></small>
                            </div>
                            <div class="card-content">
                                <div class="card-body text-left">
                                    <ul class="list-check">
                                        <li> Use a brief title and description of the item</li>
                                        <li> Make sure you post in the correct category</li>
                                        <li> Add nice photos to your ad</li>
                                        <li> Put a reasonable price</li>
                                        <li> Check the item before publish</li>

                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!--/.reg-sidebar-->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.main-container -->
<?php get_footer(); ?>

<?php 
getRequireLogin();

get_header();
if(isset($_POST['updatePost'])){
    $post_category = displayOpt('categories','category_child_of',$post['post_child_category']);
    $postslug = makeSlug($_POST['post_title']) .'-'. $post['postid'];
    updateSinglePost($post['postid'],$_POST['post_title'],$postslug,$post_category,$_POST['post_child_category'],$_POST['post_address'],$_POST['post_body'],$_POST['post_price']);
}

    uploadImage($post['postid'],randString(10));


?>
<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>


    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content">
                    <div class="inner-box category-content">
                        <h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Post a Free Classified
                            Ad</strong></h2>
                        <div class="row">
                            <div class="col-sm-12">

                                <form class="form-horizontal" method="POST" action="<?php echo get_full_url(); ?>" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Ad title</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="Adtitle" placeholder="Ad title" name="post_title" value="<?php echo $post['post_title']; ?>" required>
                                            <small id="" class="form-text text-muted">
                                                A great title needs at least 60 characters
                                            </small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Category</label>
                                        <div class="col-sm-8">
                                            <select name="post_child_category" id="category-group" class="form-control" required>
                                                <option  selected="selected" value="<?php echo displayOpt('categories','id',$post['post_child_category']); ?>">
                                                    <?php echo displayOpt('categories','category_name',$post['post_child_category']); ?>
                                                </option>
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
                                        <label  class="col-sm-3 col-form-label">City:</label>
                                        <div class="col-sm-8"><label  class="col-form-label">
                                            <?php echo displayOpt('cities','city_name',$post['post_city']); ?>
                                            </label></div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-8">
                                            <select name="post_address" id="category-group" class="form-control" required>
                                                <?php if(!$post['post_address']){?>
                                                <option value="">--</option>
                                                <?php }else{?>
                                                <option selected="selected" value="<?php echo displayOpt('cities','id',$post['post_address']); ?>"><?php echo displayOpt('cities','city_name',$post['post_address']); ?></option>
                                                <?php }?>
                                              
                                                
                                            <?php $addresses = getCities('address',$post['post_city']); foreach($addresses as $address): ?> 
                                                <option value="<?php echo $address['id']; ?>"><?php echo $address['city_name']; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Describe ad</label>
                                        <div class="col-sm-8">
                                            <textarea style="min-height:250px!important;" class="form-control" name="post_body" rows="3"><?php echo $post['post_body']; ?></textarea>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Price</label>

                                        <div class="input-group col-sm-6">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input name="post_price" type="number" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?php echo $post['post_price']; ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>


                                        
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="textarea">Picture</label>
                                        <div class="col-lg-8">
                                            <div class="mb10">
                                                <input type="file" name="image" onchange="form.submit()">
                                            </div>
                                            <p  class="form-text text-muted">
                                                Add up to 5 photos. Use a real image of your product, not catalogs
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <?php $medias = getMediaNewPostList($post['postid']); foreach($medias as $media): ?>
                                                    <div class="col" style="padding:10px">
                                                        <img style="max-width:150px;min-width:150px;" src="<?php echo '/uploads/'. $media['media_url']; ?>">
                                                </div>
                                            <?php endforeach; ?>
                                            </div>
                                    </div>

                                    

                                    <!-- Button  -->
                                    <div class="form-group row">

                                        <div class="col-sm-8">
                                             <button type="submit" name="updatePost" class="btn btn-success btn-lg">Update</button>
                                        </div>
                                    </div>


                                </form>

                                
                                <form id="upimg" action="" method="POST" enctype="multipart/form-data">
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

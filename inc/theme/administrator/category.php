<?php
        getAdminRequireLogin();
        get_header();




if(isset($_POST['addMainCategory'])){
    insertMainCategory($_POST['categoryname'],makeSlug($_POST['categoryname']));
}
if(isset($_POST['addChildCategory'])){
     insertChildCategory($_POST['childCategoryName'],makeSlug($_POST['childCategoryName']),$_POST['addChildCategory']);
}
if(isset($_POST['delCategory'])){
    deleteMainCategory($_POST['delCategory']);
}







?>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <?php the_admin_navigation(); ?>
                <div class="col-md-9">
                
                    <div class="page-content">
                        <div class="inner-box">
                            <h2 class="title-2"><i class="fas fa-edit"></i>Add Category</h2>
                            <div class="inbox-wrapper text-center">
                                <center>
                                    <form method="POST" action="<?php echo get_full_url(); ?>">
                                            <div class="row" style="max-width:90%">
                                                <div class="col-3">
                                                    <center><b>Category Name:</b></center>
                                                </div>
                                                <div class="col-5">
                                                    <input class="form-control" type="text" placeholder="" name="categoryname">
                                                </div>
                                                <div class="col-4">
                                                    <button class="btn btn-block btn-primary btn-gradient" name="addMainCategory"> Add Category </button>
                                                </div>
                                            </div>
                                    </form>
                                </center>
      
                            </div>
                            
                            <!--/. inbox-wrapper-->
                        </div>
                    </div>
                    <!--/.page-content-->
                    <div class="page-content">
                        <div class="category-list ">
                            <div class="inner-box row no-margin">

                        <?php $categorymains = getMainCategoryList('main','0');
                                if(!$categorymains){echo '<style>.forma-table{display:none;}</style><center><h1>No Category Found </h1></center>';}
                                foreach($categorymains as $catmain): ?>                
                                <table id="addManageTable"
                                       class="table table-striped table-bordered add-manage-table table demo"
                                       data-filter="#filter" data-filter-text-only="true">
                                    <thead>
                                    <tr class="forma-table">
                                        <th class="text-center">ID</th>
                                        <th data-sort-ignore="true">Category Name</th>
                                        <th> Option</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="add-img-td text-center" style="width:25px;">
                                            <b><?php echo $catmain['id']; ?></b>
                                        </td>
                                        <td class="ads-details-td text-center">
                                            <strong><a href="ads-details.html"><?php echo $catmain['category_name']; ?></a> </strong>
                                        </td>
                                        <td class="action-td text-center">
                                        <form id="mainCatFormAction" action="<?php echo get_full_url(); ?>" method="POST">
                                            <input name="delCategory" value="<?php echo $catmain['id']; ?>" hidden style="display:none!important;">
                                            <div id="demo"></div>
                                        </form>
                                             <p><button class="btn btn-danger btn-sm" onclick="deleteMainCategory()"><i class=" fa fa-trash"></i> Delete </button></p>
                                        </td>
                                    </tr>
                                        <tr>
                                        <td colspan="2">
                                            <?php $categorychilds = getMainCategoryList('child',$catmain['id']); foreach($categorychilds as $catchild): ?>  
                                                <ul>
                                                    <li><?php echo $catchild['category_name']; ?> - <a onclick="deleteChildCategory()"><i class=" fa fa-trash"></i></a>
                                                        <form id="childCatFormAction" action="<?php echo get_full_url(); ?>" method="POST">
                                                            <input name="delCategory" value="<?php echo $catchild['id']; ?>" hiden style="display:none;">
                                                        </form>

                                                    </li>
                                                </ul>
                                            <?php endforeach; ?>

                                        </td>
                                    <form method="POST" action="<?php echo get_full_url(); ?>" class="table">
                                        <td colspan="2">
                                            <div class="row">
                                                <div class="col-8">
                                                    <input type="text" class="form-control" name="childCategoryName">
                                                </div>
                                                <div class="col-4">
                                                    <button type="submit" class="btn btn-block btn-primary btn-gradient" value="<?php echo $catmain['id']; ?>" name="addChildCategory">Add</button>
                                                </div>
                                            </div>
                                            
                                            
                                        </td>
                                    </form>

                                        </tr>
                                    </tbody>
                                </table>
                       <?php endforeach; ?>
                            </div>
                    </div>
                    <!--/.page-content-->
                </div>
                </div>
            </div>
        <!--/.container-->
    </div>


<script>
function deleteMainCategory(){
  if (confirm("Press a button!")) {
      document.getElementById("mainCatFormAction").submit();
  }
}
function deleteChildCategory(){
  if (confirm("Press a button!")) {
      document.getElementById("childCatFormAction").submit();
  }
}
</script>
<?php get_footer(); ?>
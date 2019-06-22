<?php
        getAdminRequireLogin();
        get_header();




if(isset($_POST['addCity'])){
    insertCity($_POST['city_name'],makeSlug($_POST['city_name']));
}
if(isset($_POST['addAddress'])){
     insertAddress($_POST['address_name'],makeSlug($_POST['address_name']),$_POST['addAddress']);
}
if(isset($_POST['delCity'])){
    deleteCity($_POST['delCity']);
}







?>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <?php the_admin_navigation(); ?>
                <div class="col-md-9">
                
                    <div class="page-content">
                        <div class="inner-box">
                            <h2 class="title-2"><i class="fas fa-edit"></i> Add City </h2>
                            <div class="inbox-wrapper">
                                
                                 <center>
                                    <form method="POST" action="<?php echo get_full_url(); ?>">
                                            <div class="row" style="max-width:90%">
                                                <div class="col-3">
                                                    <center><b>Category City:</b></center>
                                                </div>
                                                <div class="col-5">
                                                     <input class="form-control" type="text" placeholder="" name="city_name">
                                                </div>
                                                <div class="col-4">
                                                    <button class="btn btn-block btn-primary btn-gradient" name="addCity"> Add City</button>
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











                            
                                                     

                        <?php $cities = getCities('city','0'); foreach($cities as $city): ?>                
                                <table id="addManageTable"
                                       class="table table-striped table-bordered add-manage-table table demo"
                                       data-filter="#filter" data-filter-text-only="true">
                                    <thead>
                                    <tr>
                                        <th data-sort-ignore="true">City Name</th>
                                        <th> Option</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="ads-details-td text-center" style="width:65%">
                                            <strong><a href="ads-details.html"><?php echo $city['city_name']; ?></a> </strong>
                                        </td>
                                        <td class="action-td text-center" style="width:35%">
                                        <form id="mainCityFormAction" action="<?php echo get_full_url(); ?>" method="POST">
                                            <input name="delCity" value="<?php echo $city['id']; ?>" hidden style="display:none!important;">
                                            <div id="demo"></div>
                                        </form>
                                             <p><button class="btn btn-danger btn-sm" onclick="deleteCity()"><i class=" fa fa-trash"></i> Delete </button></p>
                                        </td>
                                    </tr>
                                        <tr>
                                        <td width="65%">
                                            <?php $addresses = getCities('address',$city['id']); foreach($addresses as $address): ?>  
                                                <ul>
                                                    <li><?php echo $address['city_name']; ?> - <a onclick="deleteAddress()"><i class=" fa fa-trash"></i></a>
                                                        <form id="addressFormAction" action="<?php echo get_full_url(); ?>" method="POST">
                                                            <input name="delCity" value="<?php echo $address['id']; ?>" hiden style="display:none;">
                                                        </form>

                                                    </li>
                                                </ul>
                                            <?php endforeach; ?>

                                        </td>
                                    <form method="POST" action="<?php echo get_full_url(); ?>" class="table">
                                        <td width="35%">
                                             <div class="row">
                                                <div class="col-8">
                                                    <input type="text" class="form-control" name="address_name">
                                                </div>
                                                <div class="col-4">
                                                    <button type="submit" class="btn btn-block btn-primary btn-gradient" value="<?php echo $city['id']; ?>" name="addAddress">Add</button>
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
function deleteCity(){
  if (confirm("Do You Want to Delete this City ? ")) {
      document.getElementById("mainCityFormAction").submit();
  }
}
function deleteAddress(){
  if (confirm("Press a button!")) {
      document.getElementById("addressFormAction").submit();
  }
}
</script>
<?php get_footer(); ?>
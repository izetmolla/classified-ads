<?php
        getAdminRequireLogin();
        get_header();
if(isset($_POST['delUser'])){
    deleteMainUser($_POST['delUser']);
}
?>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <?php the_admin_navigation(); ?>
                <div class="col-md-9">
                
                    <div class="page-content">
                        <div class="inner-box">
                            <h2 class="title-2"><i class="fas fa-edit"></i>Users</h2>
                            <table id="addManageTable"
                                       class="table table-striped table-bordered add-manage-table table demo"
                                       data-filter="#filter" data-filter-text-only="true">
                                    <thead>
                                    <tr class="forma-table">
                                        <th class="text-center">ID</th>
                                        <th data-sort-ignore="true">Username</th>
                                        <th data-sort-ignore="true">Posts</th>
                                        <th data-sort-ignore="true">Email</th>
                                        <th data-sort-ignore="true">Phone</th>
                                        <th> Option</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                        <?php $users = getAdminUsersList();
                                if(!$users){echo '<style>.forma-table{display:none;}</style><center><h1>No User Found </h1></center>';}
                                foreach($users as $user): ?>                
                                    <tr>
                                        <td class="add-img-td text-center" style="width:25px;">
                                            <b><?php echo $user['id']; ?></b>
                                        </td>
                                        <td class="ads-details-td text-center"><strong><a href="#"><?php echo $user['username']; ?></a> </strong></td>
                                        <td class="ads-details-td text-center"><strong><?php echo countTablesWhere('posts','post_user',$user['id']); ?></strong></td>
                                        <td class="ads-details-td text-center"><strong><?php echo $user['email']; ?></strong></td>
                                        <td class="ads-details-td text-center"><strong><?php echo $user['phone']; ?></strong></td>
                                        <td class="action-td text-center">
                                        <form id="mainUserFormAction" action="<?php echo get_full_url(); ?>" method="POST">
                                            <input name="delUser" value="<?php echo $user['id']; ?>" hidden style="display:none!important;">
                                            <div id="demo"></div>
                                        </form>
                                             <p><button class="btn btn-danger btn-sm" onclick="deleteMainUser()"><i class=" fa fa-trash"></i> Delete </button></p>
                                        </td>
                                    </tr>
                       <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <!--/. inbox-wrapper-->
                        </div>
                    </div>
                    <!--/.page-content-->
                    <div class="page-content">
                        <div class="User-list ">

                    </div>
                    <!--/.page-content-->
                </div>
                </div>
            </div>
        <!--/.container-->
    </div>


<script>
function deleteMainUser(){
  if (confirm("Click Yes to Delete")) {
      document.getElementById("mainUserFormAction").submit();
  }
}
</script>
<?php get_footer(); ?>
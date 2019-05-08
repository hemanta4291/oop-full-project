
<?php  require_once ("inc/admin_header.php"); ?>

<?php  require_once ("inc/admin_sidebar.php"); ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>id</th>
                    <th>Name</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>details</th>
                    <th>role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>


                <?php

                $catagory_query = "select * from tbl_user";
                $cata_connect = $db->select($catagory_query);

                if($cata_connect){

                    $i=1;

                    while($get_catagor = $cata_connect->fetch_assoc()){   ?>

                        <tr class="odd gradeX">
                            <td><?php echo $i; $i++; ?></td>
                            <td><?php echo $get_catagor['id']; ?></td>
                            <td><?php echo $get_catagor['name']; ?></td>
                            <td><?php echo $get_catagor['usr_name']; ?></td>
                            <td><?php echo $get_catagor['email']; ?></td>
                            <td><?php echo $get_catagor['details']; ?></td>
                            <td><?php


                                if($get_catagor['role'] == "0"){

                                    echo "admin";

                                }else if ($get_catagor['role'] == "1"){
                                    echo "author";

                                }else if($get_catagor['role'] == "2"){
                                    echo "editor";
                                }



                                ?></td>
                            <td><a href="edit_cat.php?edi_cat_
                            id=<?php echo $get_catagor['id']; ?>">View</a>
                                <?php if(session::get("userrole") == "0"){ ?>
                                ||<a onclick="return confirm('are you sure..?')" href="delete_cat.php?del_cat_id=<?php echo $get_catagor['id']; ?>">Delete</a></td>
                                <?php } ?>
                        </tr>

                    <?php } } else{ echo "no catagory create"; } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();


    });
</script>
<?php  require_once ("inc/admin_footer.php"); ?>

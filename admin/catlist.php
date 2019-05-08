
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
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>


                    <?php

                    $catagory_query = "select * from tbl_cat";
                    $cata_connect = $db->select($catagory_query);

                    if($cata_connect){

                        $i=1;

                        while($get_catagor = $cata_connect->fetch_assoc()){   ?>

                            <tr class="odd gradeX">
                                <td><?php echo $i; $i++; ?></td>
                                <td><?php echo $get_catagor['name']; ?></td>
                                <td><a href="edit_cat.php?edi_cat_id=<?php echo $get_catagor['id']; ?>">Edit</a> ||
                                    <a onclick="return confirm('are you sure..?')" href="delete_cat.php?del_cat_id=<?php echo $get_catagor['id']; ?>">Delete</a></td>
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

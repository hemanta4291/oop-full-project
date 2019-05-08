<?php  require_once ("inc/admin_header.php"); ?>
<?php  require_once ("inc/admin_sidebar.php"); ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
                            <th>Post id</th>
                            <th>Post Cat</th>
							<th>Post Title</th>
							<th>Description</th>
							<th>Image</th>
                            <th>Author</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

                    <?php

                        $show_post = "select tbl_post.*,tbl_cat.name 
                                        from tbl_post inner join tbl_cat
                                        on tbl_post.cat=tbl_cat.id order by tbl_post.title desc";
                        $show_post_run = $db->select($show_post);

                        if($show_post_run){

                            while($get_single_post = $show_post_run->fetch_assoc()){ ?>

                                <tr class="odd gradeX">
                                    <td><?php echo $get_single_post["id"]; ?></td>
                                    <td><?php echo $get_single_post["name"]; ?></td>
                                    <td><?php echo $get_single_post["title"]; ?></td>
                                    <td><?php echo $fm->shortdata($get_single_post["body"],50); ?></td>
                                    <td><img src="upload/<?php echo $get_single_post["image"]; ?>" alt=""></td>
                                    <td><?php echo $get_single_post["author"]; ?></td>
                                    <td><a href="edit_post.php?edit_post_id=<?php echo $get_single_post["id"]; ?>">View</a>

                                        <?php

                                            if(session::get("userid")== $get_single_post["user_id"] || session::get("userrole") == '0'){ ?>

                                        || <a href="edit_post.php?edit_post_id=<?php echo $get_single_post["id"]; ?>">Edit</a> ||
                                        <a onclick="return confirm('are you sure?')" href="delete_post.php?delete_post_id=<?php echo $get_single_post["id"]; ?>">Delete</a></td>


                                           <?php }  ?>

                                </tr>


                          <?php  } } ?>

					</tbody>
				</table>
	
               </div>
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


<?php  require_once ("inc/admin_header.php"); ?>
<?php  require_once ("inc/admin_sidebar.php"); ?>

    <?php

        if(isset($_GET['seen_id'])){

            $get_seen_id = $_GET['seen_id'];

            $show_post = "update tbl_contact set status='1' where id=$get_seen_id";
            $show_post_run = $db->update($show_post);
            if($show_post_run){
                echo "massage send to seen box";
            }else{
                echo "something wrong";
            }

        }

    ?>




        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>id</th>
							<th>fname</th>
							<th>lname</th>
							<th>Email</th>
							<th>Body</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                    <?php

                    $show_post = "select * from tbl_contact where status='0'";
                    $show_post_run = $db->select($show_post);
                    if($show_post_run){
                        $sri=0;
                        while ($get_data = $show_post_run->fetch_assoc()){  $sri++;?>
                            <tr class="odd gradeX">
                                <td><?php echo $sri;?></td>
                                <td><?php echo $get_data['id'];?></td>
                                <td><?php echo $get_data['fname'];?></td>
                                <td><?php echo $get_data['lname'];?></td>
                                <td><?php echo $get_data['email'];?></td>
                                <td><?php echo $fm->shortdata($get_data['body'],30);?></td>
                                <td><?php echo $fm->formantedate($get_data['date']);?></td>
                                <td><a href="view_inbox.php?view_id=<?php echo $get_data['id'];?>">View</a> ||
                                    <a href="replay_inbox.php?replay_id=<?php echo $get_data['id'];?>">Replay</a>||
                                    <a href="?seen_id=<?php echo $get_data['id'];?>">Seen</a>
                                </td>
                            </tr>
                     <?php } } ?>

					</tbody>
				</table>
               </div>
            </div>

            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">
                    <table class="data display datatable" id="example">
                        <thead>
                        <tr>
                            <th>Serial No.</th>
                            <th>id</th>
                            <th>fname</th>
                            <th>lname</th>
                            <th>Email</th>
                            <th>Body</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $show_post = "select * from tbl_contact where status='1'";
                        $show_post_run = $db->select($show_post);
                        if($show_post_run){
                            $sri=0;
                            while ($get_data = $show_post_run->fetch_assoc()){  $sri++;?>
                                <tr class="odd gradeX">
                                    <td><?php echo $sri;?></td>
                                    <td><?php echo $get_data['id'];?></td>
                                    <td><?php echo $get_data['fname'];?></td>
                                    <td><?php echo $get_data['lname'];?></td>
                                    <td><?php echo $get_data['email'];?></td>
                                    <td><?php echo $fm->shortdata($get_data['body'],30);?></td>
                                    <td><?php echo $fm->formantedate($get_data['date']);?></td>
                                    <td><a href="?delete_id=<?php echo $get_data['id'];?>">delete</a>
                                    </td>
                                </tr>
                            <?php } } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/table/table.js"></script>
        <script src="js/setup.js" type="text/javascript"></script>
        <script type="text/javascript">

            $(document).ready(function () {
                setupLeftMenu();

                $('.datatable').dataTable();
                setSidebarHeight();


            });
        </script>
<?php  require_once ("inc/admin_footer.php"); ?>
<?php  require_once ("inc/admin_header.php"); ?>
<?php  require_once ("inc/admin_sidebar.php"); ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>


                <h3>

                    <?php

                    if(($_SERVER["REQUEST_METHOD"])== "POST") {

                        $copyright = $_POST["copyright"];


                        $check_copyright = mysqli_real_escape_string($db->link, $copyright);


                        $insert_q = "update tbl_footer 
                                                set 
                                                text='$check_copyright'
                                                where 
                                                id=1 ";

                        $inser_run = $db->update($insert_q);

                        if ($inser_run == true) {
                            echo "update successfull";
                        } else {
                            echo "not update";
                        }
                    }
                    ?>


                </h3>



                <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">

                        <?php

                        $show_post = "select * from tbl_footer";
                        $show_post_run = $db->select($show_post);

                        if ($show_post_run) {
                            $get_single_post = $show_post_run->fetch_assoc();
                        }

                        ?>


                        <tr>
                            <td>
                                <input type="text" value="<?php echo $get_single_post['text'];?>" placeholder="Enter Copyright Text..." name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>

<?php  require_once ("inc/admin_footer.php"); ?>

<?php  require_once ("inc/admin_header.php"); ?>
<?php  require_once ("inc/admin_sidebar.php"); ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>

                <h3>

                    <?php

                    if(($_SERVER["REQUEST_METHOD"])== "POST") {

                        $facebook = $_POST["facebook"];
                        $twitter = $_POST["twitter"];
                        $linkedin = $_POST["linkedin"];
                        $googleplus = $_POST["googleplus"];

                        $check_title = mysqli_real_escape_string($db->link, $facebook);
                        $check_twiter = mysqli_real_escape_string($db->link, $twitter);
                        $check_lin = mysqli_real_escape_string($db->link, $linkedin);
                        $check_google = mysqli_real_escape_string($db->link, $googleplus);


                            $insert_q = "update tbl_social 
                                                set 
                                                fa='$check_title',
                                                tw='$check_twiter',
                                                ln='$check_lin',
                                                gp='$check_google'
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


                <div class="block">               
                 <form action="" method="post">
                    <table class="form">

                        <?php

                        $show_post = "select * from tbl_social";
                        $show_post_run = $db->select($show_post);

                        if ($show_post_run) {
                            $get_single_post = $show_post_run->fetch_assoc();
                        }


                        ?>


                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $get_single_post['fa'];?>" name="facebook" placeholder="Facebook link.." class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $get_single_post['tw'];?>" name="twitter" placeholder="Twitter link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $get_single_post['ln'];?>" name="linkedin" placeholder="LinkedIn link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $get_single_post['gp'];?>" name="googleplus" placeholder="Google Plus link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
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
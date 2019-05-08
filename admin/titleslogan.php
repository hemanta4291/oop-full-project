<?php  require_once ("inc/admin_header.php"); ?>
<?php  require_once ("inc/admin_sidebar.php"); ?>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <h3>

                    <?php

                    if(($_SERVER["REQUEST_METHOD"])== "POST") {

                        $title = $_POST["title"];
                        $slogan = $_POST["slogan"];
                        $image = $_FILES["logo"]["name"];
                        $image_tmp = $_FILES["logo"]["tmp_name"];
                        $location = "upload/";
                        $img_uniq_name ="logo.png";

                        $selectCheck = mysqli_real_escape_string($db->link, $title);
                        $titleCheck = mysqli_real_escape_string($db->link, $slogan);

                        if($image ==''){

                            $insert_q = "update title_slogan 
                                                set 
                                                title='$title',
                                                slogan='$slogan' where 
                                                id=1 ";

                            $inser_run = $db->update($insert_q);

                            if ($inser_run == true) {
                                echo "update successfull";
                            } else {
                                echo "not update";
                            }


                        }else{
                            move_uploaded_file($image_tmp, $location . "$img_uniq_name");
                            $insert_q = "update title_slogan 
                                                set 
                                                title='$title',
                                                slogan='$slogan' where 
                                                id=1 ";

                            $inser_run = $db->update($insert_q);

                            if ($inser_run == true) {
                                echo "update successfull";
                            } else {
                                echo "not update";
                            }

                        }

                    }
                    ?>


                </h3>
                <div class="block sloginblock">               
                 <form action="" method="post" enctype="multipart/form-data">

                     <?php

                     $show_post = "select * from title_slogan";
                     $show_post_run = $db->select($show_post);

                     if ($show_post_run) {
                         $get_single_post = $show_post_run->fetch_assoc();
                     }


                     ?>
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $get_single_post['title'] ?>" placeholder="Enter Website Title..."  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $get_single_post['slogan'] ?>" placeholder="Enter Website Slogan..." name="slogan" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input name="logo" type="file" />
                            </td>
                            <td>
                                <img src="<?php echo $get_single_post['logo'] ?>" alt="">
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                            </td>
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

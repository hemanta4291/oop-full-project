
<?php  require_once ("inc/admin_header.php"); ?>
<?php  require_once ("inc/admin_sidebar.php"); ?>


<?php


if(!isset($_GET['edit_post_id']) || $_GET['edit_post_id']== NULL){

    header("location:postlist.php");
}else{
    $edit_post_id = $_GET['edit_post_id'];
}


?>


<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New Post</h2>

        <h3><?php


            if(($_SERVER["REQUEST_METHOD"])== "POST") {

                $title = $_POST["post_title"];
                $select_cat = $_POST["select"];
                $image = $_FILES["image"]["name"];
                $image_tmp = $_FILES["image"]["tmp_name"];
                $location = "upload/";
                $img_uniq_name = uniqid() . ".jpg";
                $body_text = $_POST["body_text"];
                $tag = $_POST["tag"];
                $author = $_POST["author"];
                $userid = $_POST["userid"];

                $selectCheck = mysqli_real_escape_string($db->link, $select_cat);
                $titleCheck = mysqli_real_escape_string($db->link, $title);
                $bodyCheck = mysqli_real_escape_string($db->link, $body_text);
                $tagCheck = mysqli_real_escape_string($db->link, $tag);
                $authorCheck = mysqli_real_escape_string($db->link, $author);
                $userid = mysqli_real_escape_string($db->link, $userid);

                move_uploaded_file($image_tmp, $location . "$img_uniq_name");


                if ($selectCheck == '' || $titleCheck == ''  || $bodyCheck == '' || $tagCheck == '' || $authorCheck == '') {
                    echo "felid not empty";
                } else {

                    if($image ==''){

                        $insert_q = "update tbl_post 
                                    set 
                                    cat='$selectCheck',
                                    title='$titleCheck',
                                    body='$bodyCheck',
                                    author='$authorCheck',
                                    tag='$tagCheck',
                                     user_id='$userid' where 
                                    id=$edit_post_id ";

                        $inser_run = $db->update($insert_q);

                        if ($inser_run == true) {
                            echo "update successfull";
                        } else {
                            echo "not update";
                        }


                    }else{
                        $insert_q = "update tbl_post 
                                    set 
                                    cat='$selectCheck',
                                    title='$titleCheck',
                                    body='$bodyCheck',
                                    image='$img_uniq_name',
                                    author='$authorCheck',
                                    tag='$tagCheck',
                                     user_id='$userid' where 
                                    id=$edit_post_id ";

                        $inser_run = $db->update($insert_q);

                        if ($inser_run == true) {
                            echo "update successfull";
                        } else {
                            echo "not update";
                        }

                    }


                }

            }
            ?></h3>
        <div class="block">
            <form action=" " method="post" enctype="multipart/form-data">
                <table class="form">

                    <?php

                    $show_post = "select * from tbl_post where id=$edit_post_id";
                    $show_post_run = $db->select($show_post);

                    if($show_post_run){

                    while($get_single_post = $show_post_run->fetch_assoc()){ ?>



                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $get_single_post["title"]; ?>" name="post_title" placeholder="Enter Post Title..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="select">
                                <option value="">Select Catoegory</option>

                                <?php

                                $catagory_query = "select * from tbl_cat";
                                $cata_connect = $db->select($catagory_query);

                                if($cata_connect){

                                    while($get_catagor = $cata_connect->fetch_assoc()){ ?>



                                        <option
                                            <?php
                                            if($get_single_post['cat'] == $get_catagor['id']){ ?>

                                                selected="selected"

                                            <?php  } ?>


                                            value="<?php echo $get_catagor['id']; ?>"><?php echo $get_catagor['name']; ?></option>
                                    <?php } } else{ echo "no catagory create"; } ?>



                            </select>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <label>Date Picker</label>
                        </td>
                        <td>
                            <input type="text" id="date-picker" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input value="<?php echo $get_single_post["image"]; ?>" name="image" type="file" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea name="body_text" class="tinymce"><?php echo $get_single_post["body"]; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Tag</label>
                        </td>
                        <td>
                            <input name="tag" value="<?php echo $get_single_post["tag"]; ?>" type="text" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Author</label>
                        </td>
                        <td>
                            <input name="author" value="<?php echo $get_single_post["author"]; ?>" type="text" />

                        </td>
                        <td>
                            <input name="userid" value="<?php echo session::get('userid')?>" type="hidden" />
                        </td>
                    </tr>


                    <?php  } } ?>


                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>


<?php  require_once ("inc/admin_footer.php"); ?>

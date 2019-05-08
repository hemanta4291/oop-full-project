
<?php  require_once ("inc/admin_header.php"); ?>
<?php  require_once ("inc/admin_sidebar.php"); ?>

<?php


if(!isset($_GET['edi_id']) || $_GET['edi_id']== NULL){

    header("location:addpage.php");
}else{
    $edi_id = $_GET['edi_id'];
}


?>


<div class="grid_10">

    <div class="box round first grid">
        <h2>Edit Page</h2>

        <h3><?php


            if(($_SERVER["REQUEST_METHOD"])== "POST") {

                $title = $_POST["page_title"];
                $body_text = $_POST["body_text"];

                $titleCheck = mysqli_real_escape_string($db->link, $title);
                $bodyCheck = mysqli_real_escape_string($db->link, $body_text);


                $insert_q = "update tbl_page 
                                    set 
                                    title='$titleCheck',
                                    body='$bodyCheck' where 
                                    id=$edi_id ";

                $inser_run = $db->update($insert_q);

                if ($inser_run == true) {
                    echo "update successfull";
                } else {
                    echo "not update";
                }



            }
            ?></h3>
        <div class="block">
            <form action=" " method="post" >
                <table class="form">

                    <?php

                    $show_post = "select * from tbl_page where id=$edi_id";
                    $show_post_run = $db->select($show_post);

                    if($show_post_run){

                       $get_single_post = $show_post_run->fetch_assoc();

                    }

                            ?>


                            <tr>
                                <td>
                                    <label>Title</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $get_single_post["title"]; ?>" name="page_title" placeholder="Enter Post Title..." class="medium" />
                                </td>
                            </tr>

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
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="update" />

                            <a href="delete_page.php?del_id=<?php echo $get_single_post["id"]; ?>">delete</a>
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

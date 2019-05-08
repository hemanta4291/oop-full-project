
<?php  require_once ("inc/admin_header.php"); ?>
<?php  require_once ("inc/admin_sidebar.php"); ?>

<?php

    if(!isset($_GET['view_id']) || $_GET['view_id']== NULL){

        header("location:inbox.php");
    }else{
        $view_id = $_GET['view_id'];
    }

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
       echo "<script>window.location='inbox.php';</script>";
    }


?>


<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New Page</h2>
        <div class="block">
            <form action=" " method="post" enctype="multipart/form-data">
                <table class="form">

                    <?php
                    $show_post = "select * from tbl_contact where id=$view_id";
                    $show_post_run = $db->select($show_post);

                    $get_data= $show_post_run->fetch_assoc();

                    ?>

                    <tr>
                        <td>
                            <label>fname</label>
                        </td>
                        <td>
                            <input type="text" readonly name="name" value="<?php echo $get_data['fname'];?>" placeholder="Enter Post Title..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>lname</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?php echo $get_data['lname'];?>" name="name" placeholder="Enter Post Title..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>email</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?php echo $get_data['email'];?>" name="name" placeholder="Enter Post Title..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>massage</label>
                        </td>
                        <td>
                            <textarea name="body_text" class="tinymce"><?php echo $get_data['body'];?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="update" />
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

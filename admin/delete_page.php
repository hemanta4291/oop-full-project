

<?php require_once ("../lib/session.php");

session::checksession();

?>
<?php require_once ("../config/config.php")?>
<?php require_once ("../lib/Database.php")?>
<?php

$db = new Database();
?>

<?php

    if(isset($_GET['del_id'])){

        $get_del_id = $_GET['del_id'];

    }


    $show_post = "delete from tbl_page where id=$get_del_id";
    $show_post_run = $db->delete($show_post);

    if ($show_post_run) {

        header("location:index.php?del_msg=Page Delete Successfull");

    }


?>

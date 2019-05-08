<?php require_once ("inc/header.php")?>

<?php

    if(isset($_GET['page_id'])){

        $get_id = $_GET['page_id'];

    }


?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">

                    <?php

                    $show_post = "select * from tbl_page where id=$get_id";
                    $show_post_run = $db->select($show_post);

                    if($show_post_run){

                       $get_single_post = $show_post_run->fetch_assoc();

                    } ?>

				<h2><?php echo $get_single_post["title"]; ?></h2>

				<p><?php echo $get_single_post["body"]; ?>.</p>
	</div>

		</div>
        <?php require_once ("inc/sidebar.php")?>
    <?php require_once ("inc/footer.php")?>
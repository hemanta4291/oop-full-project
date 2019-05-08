<?php require_once ("inc/header.php")?>


<?php

    if(!isset($_GET["signle_post_id"]) || $_GET["signle_post_id"] == null ){

        header("location:404.php");

    }else{

        $signle_post_id = $_GET["signle_post_id"];

    }


?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">

                <?php


                $single_query = "select * from tbl_post where id=$signle_post_id";
                $single_post = $db->select($single_query);


                if($single_post){

                    while ($get_single_post = $single_post->fetch_assoc()){

                        ?>
                        <h2><?php echo $get_single_post['title']; ?></h2>
                        <h4><?php echo $fm->formantedate($get_single_post['date']); ?>, <?php echo $get_single_post['author']; ?></h4>
                        <img src="admin/upload/<?php echo $get_single_post['image']; ?>" alt="post image"/>

                        <p>
                            <?php echo $get_single_post['body']; ?>
                        </p>

                        <div class="relatedpost clear">
                            <h2>Related articles</h2>

                            <?php

                                $catid = $get_single_post['cat'];

                                $related_query = "select * from tbl_post where cat='$catid' order by rand() limit 3";
                                $related_post = $db->select($related_query);


                                if($related_post){

                                    while ($get_related_post = $related_post->fetch_assoc()){ ?>

                                        <p><?php echo $get_related_post['title'] ?></p>

                                   <a href="post.php?signle_post_id=<?php echo $get_related_post['id'] ?>"><img src="admin/upload/<?php echo $get_related_post['image'] ?>" alt="post image"/></a>

                                <?php } }else{
                                    echo "no related post available";
                                } ?>
                        </div>

                    <?php } } else{
                    header("location:404.php");
                } ?>




	</div>

		</div>
        <?php require_once ("inc/sidebar.php")?>
        <?php require_once ("inc/footer.php")?>

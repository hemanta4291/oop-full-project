
<?php require_once ("inc/header.php")?>
<?php require_once ("inc/slider.php")?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

            <!-- pagination -->
            <?php

            $total_limit_page = 3;
                if(isset($_GET["page"])){
                    $page = $_GET["page"];
                }else{
                    $page = 1;
                }

                $start_page = ($page-1) * $total_limit_page;

            ?>


            <?php

            $query = "select * from tbl_post limit $start_page, $total_limit_page";
            $post = $db->select($query);

            if($post){

                while($get_data = $post->fetch_assoc()){ ?>

                    <div class="samepost clear">
                        <h2><?php echo $get_data['title']; ?></h2>
                        <h4> <?php echo $fm->formantedate($get_data['date']); ?> <a href="#"><?php echo $get_data['author']; ?></a></h4>
                        <a href="post.php?signle_post_id=<?php echo $get_data['id']; ?>"><img src="admin/upload/<?php echo $get_data['image']; ?>" alt="post image"/></a>
                        <p>
                            <?php echo $fm->shortdata($get_data['body']); ?>
                        </p>
                        <div class="readmore clear">
                            <a href="post.php?signle_post_id=<?php echo $get_data['id']; ?>">Read More</a>
                        </div>
                    </div>

            <?php    } } ?>


           <?php

           $pagination_select = "select * from tbl_post";
           $pagi_run = $db->select($pagination_select);
           $pagi_rows = mysqli_num_rows($pagi_run);

           echo $pagi_rows;

           $total_pages = ceil($pagi_rows/$total_limit_page);

           echo "<span class='pagination'><a href='index.php?page=1'>".'frist page'."</a>"?>

           <?php

           for($i=1; $i <= $total_pages; $i++){

               echo "<a href='index.php?page=".$i."'>".$i."</a>";
           }

           ?>

           <?php echo "<a href='index.php?page=$total_pages'>".'Last page'."</a></span>"?>

		</div>
        <?php require_once ("inc/sidebar.php")?>
        <?php require_once ("inc/footer.php")?>

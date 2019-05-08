
<?php require_once ("inc/header.php")?>



<?php

if(!isset($_POST["search"]) || $_POST["search"] == null ){

    header("location:404.php");
}else{
    $search = $_POST["search"];
}


?>


<div class="contentsection contemplete clear">
    <div class="maincontent clear">

        <?php

        $query = "select * from tbl_post where title like '%$search%' or body like '%$search%'";
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

            <?php    } }else{ echo "your search query not found";} ?>





    </div>
    <?php require_once ("inc/sidebar.php")?>
    <?php require_once ("inc/footer.php")?>

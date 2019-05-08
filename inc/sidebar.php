



<div class="sidebar clear">
    <div class="samesidebar clear">
        <h2>Categories</h2>
        <ul>
            <?php

            $catagory_query = "select * from tbl_cat";
            $cata_connect = $db->select($catagory_query);

            if($cata_connect){

                while($get_catagor = $cata_connect->fetch_assoc()){ ?>

                    <li><a href="catagory_post.php?catatory_id=<?php echo $get_catagor['id']; ?>"><?php echo $get_catagor['name']; ?></a></li>

            <?php } } else{ echo "no catagory create"; } ?>

        </ul>
    </div>

    <div class="samesidebar clear">
        <h2>Latest articles</h2>

        <?php

        $query = "select * from tbl_post limit 5";
        $post = $db->select($query);

        if($post){

            while($get_data = $post->fetch_assoc()){ ?>

                <div class="popular clear">
                    <h3><a href="post.php?signle_post_id=<?php echo $get_data['id']; ?>"><?php echo $get_data['title']; ?></a></h3>
                    <a href="post.php?signle_post_id=<?php echo $get_data['id']; ?>"><img src="admin/upload/<?php echo $get_data['image']; ?>" alt="post image"/></a>
                    <p>
                        <?php echo $fm->shortdata($get_data['body'],170); ?>
                    </p>
                </div>



            <?php    } } ?>






    </div>

</div>
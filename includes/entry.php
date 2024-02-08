<!-- Custom CSS -->
<link href="css/includes/entries.css" rel="stylesheet">

<div class="col-md-8">

    <h1 class="">
    Page Heading
    <small>Secondary Text</small>
    </h1>

    <hr>

    <?php 
        $query = "SELECT * FROM post";
        $select_all_posts_query = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_all_posts_query)){
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author_id = $row['post_author_id'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_comment_count = $row['post_comment_count'];
            $post_likes = $row['post_likes'];
            $post_category_id = $row['post_category_id'];
    ?>
            

            <!-- Blog Post -->
            <h3>
                <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title?></a>
            </h3>
            <p class="">
                by <a href="index.php"><?php echo $post_author_id?></a>
            </p>
            <img class="img-responsive post-img" src="images/<?php echo $post_image;?>" alt="">
            <p class=""><span class="glyphicon glyphicon-time">&nbsp</span><?php echo $post_date?></p>
            <!--<p class=""><?php echo $post_content?></p>-->
            <button type="button" class="btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-chat svg-post-info" viewBox="0 0  16 16">
                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                </svg>
                <?php echo $post_likes ?>
            </button>
            <button type="button" class="btn">
                <svg xmlns="http://www.w3.org/2000/svg"  width="16" height="16" class="bi bi-chat svg-post-info"  viewBox="0 0 16 16">
                <path d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105"></path>
                </svg>
                <?php echo $post_comment_count ?>
            </button>
            <a class="btn btn-primary read-more-btn" href="#">Read more <span class="glyphicon glyphicon-chevron-right"></span></a>
            <hr>
    <?php 
        }
    ?>

    <!-- Pager -->
    <ul class="pager">
        <li class="previous">
            <a href="#">&larr; Older</a>
        </li>
        <li class="next">
            <a href="#">Newer &rarr;</a>
        </li>
    </ul>

</div>
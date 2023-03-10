<!-- DB connection -->
<?php include "./includes/db.php" ?>

<!-- Head -->
<?php include "./includes/head.php"?>

<body>

    <!-- Navigation -->
    <?php include './includes/navigation.php'?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->

                <?php 
                    //Query for selecting all current posts
                    $query = "SELECT * FROM posts";
                    $select_all_posts_query = mysqli_query($connection,$query);
                
                ?>
                    
                <?php
                    while($row = mysqli_fetch_assoc($select_all_posts_query)){
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        $post_comment_count = $row['post_comment_count'];
                        $post_like_count = $row['post_like_count'];
                ?>
                        <h2> <a href="#"><?php echo $post_title?></a></h2>
                        <p class="lead">
                        by <a href="index.php"><?php echo $post_author?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date?></p>
                        <hr>
                        <img class="img-responsive" src="./images/<?php echo $post_image?>" alt="">
                        <hr>
                        <p><?php echo $post_content?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
                <?php
                    }
                ?>
                
               
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "./includes/sidebar.php"?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "./includes/footer.php"?>

    </div>
    <!-- /.container -->

    <!-- JS includes from JS folder -->
    <?php include "./js/jsIncludes.php"?>

</body>

</html>

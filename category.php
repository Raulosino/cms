
<!-- head -->
<?php include "includes/head.php"; ?>

<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Entries Column -->
            <?php 
                if(isset($_GET['category'])){
                    $cat_id = $_GET['category'];
                }
                include "includes/display-category.php"; 
            ?>
        
            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php";?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
       <?php include "includes/footer.php";?>

</body>

</html>

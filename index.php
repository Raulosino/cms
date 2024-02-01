
<!-- head -->
<?php include "includes/head.php"; ?>

<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">
        <?php
             echo 'Current PHP version: ' . phpversion();
        ?>
        <div class="row">

            <!-- Blog Entries Column -->
            <?php include "includes/entries.php";?>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php";?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
       <?php include "includes/footer.php";?>

</body>

</html>

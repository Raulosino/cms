<!-- Head -->
<?php include "includes/head.php"; ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="">
                            Categories
                            <small>Subheading</small>
                        </h1>

                        <!-- add category code-->
                        <?php insert_categories(); ?>
                        
                        <!-- Add category form -->
                        <div class="col-xs-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category: </label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
                        </div>


                        <!-- Display all categories query-->
                        <div class="col-xs-6">
                            <table class="table table-border table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <!-- Display all categories -->
                                        <?php display_all_categories_table();?>
                                </tbody>
                            </table>
                        </div>


                        <!-- update and include query -->
                        <?php 
                            if(isset($_GET['edit'])){
                                $cat_id = $_GET['edit'];
                                include 'includes/update_category.php';
                            }
                        ?>


                        <!-- Delete category query-->
                        <?php delete_category(); ?>
                
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Footer-->
    <?php include "includes/footer.php"; ?>

</body>

</html>

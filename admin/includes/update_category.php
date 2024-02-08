

<!-- Edit Category query-->
<?php 
if(isset($_GET['edit'])){
    $edit_cat_id = $_GET['edit'];
    $query = "SELECT * FROM category WHERE cat_id = {$edit_cat_id}";
    $edit_category_query = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($edit_category_query )){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
?>
        <!-- Edit category form -->
        <div class="col-xs-6">
            <form action="" method="post">
                <div class="form-group">
                    <label for="cat_title">Edit Category: </label>
                    <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" class="form-control" type="text" name="old_cat_title" disabled>
                    <br>
                    <label for="update_cat_title">New Category name: </label>
                    <input class="form-control" type="text" name="update_cat_title">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                    <a class="btn btn-primary" href='categories.php'>Cancel</a>
                </div>
            </form>
        </div>
        <?php   
    }
}
?>



<?php
if(isset($_POST['update_category'])){
    $update_cat_title = $_POST['update_cat_title'];
    $query = "UPDATE category SET cat_title = '{$update_cat_title}' WHERE cat_id = '{$cat_id}'";
    $update_query = mysqli_query($connection,$query);
    header("Location: categories.php");
}
?>

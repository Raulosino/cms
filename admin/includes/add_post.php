<?php 
    if(isset($_POST['create_post'])){
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = 0;

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');


        move_uploaded_file($post_image_temp,"../images/$post_image");

        
        $query = "INSERT INTO post(post_category_id, post_title, post_author_id, post_date, post_image, 
                    post_content, post_tags, post_status) VALUES($post_category_id, 
                    '$post_title', 
                    '$post_author', now(), '$post_image', '$post_content', '$post_tags', $post_status)";

        $create_post_query = mysqli_query($connection,$query);

       confirmQuery($create_post_query);
       header("Location: ./posts.php");
    }
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title:</label>
        <input type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
        <label for="post_category">Post Category:</label>
        <select class="form-select" name="post_category_id" id="post_category_id">
            <?php 
                $select_all_categories = "SELECT * FROM category";
                $select_all_categories_query = mysqli_query($connection,$select_all_categories);
                while($row = mysqli_fetch_assoc($select_all_categories_query)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<option value='$cat_id'>$cat_title</option>";
                }  
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="author">Post Author:</label>
        <input type="number" class="form-control" name="post_author">
    </div>

    <div class="form-group">
        <label for="post_image">Post Image:</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags:</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content:</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div> 

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>

</form>

<?php 
    if(isset($_GET['p_id'])){
        $selected_post_id = $_GET['p_id'];
    }

    /* Fetched post with $_GET*/
    $query = "SELECT * FROM post WHERE post_id = $selected_post_id";
    $select_post_by_id = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_post_by_id)){
        $post_id = $row['post_id'];
        $post_author = $row['post_author_id'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_current_image = $row['post_image'];
        $post_comment_count = $row['post_comment_count'];
        $post_likes = $row['post_likes'];
        $post_tags = $row['post_tags'];
        $post_content = $row['post_content'];
    }


    if(isset($_POST['update_post'])){

        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = 0;
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        
        if(empty($post_image)){
            $post_image = $post_current_image;
        }

        move_uploaded_file($post_image_temp,"../images/$post_image");

        if(empty($post_image)){
            
        }

        $query = "UPDATE post SET ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_category_id = '{$post_category_id}', ";
        $query .= "post_author_id = '{$post_author}', ";
        $query .= "post_status = '{$post_status}', ";
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_image = '{$post_image}' ";
        $query .= "WHERE post_id = {$selected_post_id} ";
        
        $update_post = mysqli_query($connection,$query);
        
        header("Location: ./posts.php");
        
    }
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title:</label>
        <input type="text" class="form-control" name="post_title" value="<?php echo $post_title?>">
    </div>

    <div class="form-group">
        <label for="post_category">Post Category:</label>
        <select class="form-select" name="post_category_id" id="post_category_id" value="<?php echo $post_category_id ?>">
            <?php 
                // Fetches the current category_id from the post 
                $select_current_category = "SELECT * FROM category WHERE cat_id = $post_category_id";
                $select_current_categories_query = mysqli_query($connection,$select_current_category);
                $cat_title = mysqli_fetch_assoc($select_current_categories_query)["cat_title"];
                echo "<option value='$post_category_id'>$cat_title</option>";

                
                $select_all_categories = "SELECT * FROM category";
                $select_all_categories_query = mysqli_query($connection,$select_all_categories);
                while($row = mysqli_fetch_assoc($select_all_categories_query)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    if($cat_id!=$post_category_id){
                        echo "<option value='$cat_id'>$cat_title</option>";
                    }
                }  
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="author">Post Author:</label>
        <input type="number" class="form-control" name="post_author" value="<?php echo $post_author?>">
    </div>

    <div class="form-group">
        <label for="post_status">Post status:</label>
        <input type="text" class="form-control" name="post_status" value="<?php echo $post_status?>">
    </div>

    <div class="form-group">
        <label for="post_image">Post Image:</label>
        <img width=125 src='../images/<?php echo $post_current_image?>' alt='image'></td>
    </div>
    <div class="form-group">
        <input type="file" name="image" class="mt-1">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags:</label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags?>">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content:</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10" ><?php echo $post_content?></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>

</form>
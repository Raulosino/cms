<table class="table table-border table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Comments</th>
            <th>Likes</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM post";
            $select_all_posts_query = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($select_all_posts_query)){
                $post_id = $row['post_id'];
                $post_author_id = $row['post_author_id'];
                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_comment_count = $row['post_comment_count'];
                $post_likes = $row['post_likes'];
                $post_date = $row['post_date'];


                echo "<tr>";
                    echo "<td>$post_id</td>";
                    echo "<td>$post_author_id</td>";
                    echo "<td>$post_title</td>";
                    echo "<td> $post_category_id</td>";
                    echo "<td> $post_status</td>";
                    echo "<td><img width=125 src='../images/$post_image' alt='image'></td>";                                    
                    echo "<td>$post_comment_count</td>";
                    echo "<td>$post_likes</td>";
                    echo "<td>$post_date</td>";
                    echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                    echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                echo "</tr>";
            }
        ?>

    </tbody>

</table>

<?php 
    if(isset($_GET['delete'])){
        $delete_post_id = $_GET['delete'];
        $query = "DELETE FROM post where post_id = {$delete_post_id} ";
        $delete_post_query = mysqli_query($connection,$query);
        header("Location: posts.php");
    }

?>
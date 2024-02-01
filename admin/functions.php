<?php 

function confirmQuery($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED " . mysqli_error($connection));
    }
}

//adds a new category
function insert_categories(){
    global $connection;
    
    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)){
            echo "<spam class='text-danger'>This field should not be empty</spam>";
        }else{
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('$cat_title') ";

            $create_category_query = mysqli_query($connection,$query);

            if(!$create_category_query){
                die("QUERY FAILED " . mysqli_error($connection));
            }

            header("Location: categories.php");
        }

    }              
}

//Displays all categories in a table
function display_all_categories_table(){
    global $connection;
    $query = "SELECT *  FROM categories";
    $select_all_categories_query = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_all_categories_query)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    } 
}

//Deletes one category
function delete_category(){
    global $connection;
    if(isset($_GET['delete'])){
        $delete_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$delete_cat_id} ";
        $delete_query = mysqli_query($connection,$query);
        header("Location: categories.php");
    }
}




?>
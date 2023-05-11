<?php
if(isset($_POST['delete'])){
    require_once 'dbh.php';
    $id = $_POST['delete_data'];
    $sql = "DELETE FROM users WHERE id='$id' ";
    $query_run = mysqli_query($conn, $sql);
    if($query_run) {
        header('Location: ../admin.php?success'); 
    }
    else {
        header('Location: ../admin.php?error'); 
    }    
}
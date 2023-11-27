<?php
include "connection.php";

if(isset($_POST["delete-artisan"])){
    $_id = $_POST["deleted-artisan-id"];

    // Use a prepared statement to prevent SQL injection
    $query = "DELETE FROM `artisant` WHERE `id` = ?";

    $stmt = mysqli_prepare($conn, $query);

    if($stmt === false) {
        die("La préparation de la requête a échoué" . mysqli_error($conn));
    }

    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "i", $_id);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    if(!$result){
        die("La requête a échoué" . mysqli_error($conn));
    } else {
        header("location: http://localhost/brief4-sanaat-bladi/dashboard.php");
        exit;
    }
}
?>
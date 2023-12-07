<?php
include "connection.php";
if(isset($_POST["edit-data"])){
    $_id = $_POST["id"];
    $_produit = $_POST["produitModal"];
    $_desc = $_POST["descModal"];
    $_categorie = $_POST["ctgrModal"];
    $_artisan = $_POST["artisanModal"];

    if(empty($_produit) || empty($_desc) || empty($_categorie) || empty($_artisan)){
        header("location: dashboard.php?message=Champ vide");
        exit;
    } else {
        // Use prepared statements to prevent SQL injection
        $query = "UPDATE `produit` SET `nom` = ?, `description` = ?, `categorie_Id` = ?, `artisant_Id` = ? WHERE `id` = ?";

        $stmt = mysqli_prepare($conn, $query);

        if($stmt === false) {
            die("La préparation de la requête a échoué" . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "ssiii", $_produit, $_desc, $_categorie, $_artisan, $_id);

        
        $result = mysqli_stmt_execute($stmt);

        if(!$result){
            die("La requête a échoué" . mysqli_error($conn));
        } else {
            header("location: http://localhost/brief4-sanaat-bladi/dashboard.php");
            exit;
        }
    }
}
?>
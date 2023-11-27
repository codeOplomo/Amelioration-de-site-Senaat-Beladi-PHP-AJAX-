<?php
include "connection.php";
if(isset($_POST["edit-artisant"])){
    $_id = $_POST["id"];
    $_nom = $_POST["artisanModal"];
    $_ville = $_POST["villeModal"];
    $_telephone = $_POST["telArtisanModal"];
    $_categorieId = $_POST["ctgrArtisanModal"];
    $_gender = $_POST["genderModal"];

    if(empty($_nom) || empty($_ville) || empty($_telephone) || empty($_categorieId) || empty($_gender)){
        header("location: dashboard.php?message=Champ vide");
        exit;
    } else {
        // Use prepared statements to prevent SQL injection
        $query = "UPDATE `artisant` SET `nom_complet` = ?, `genre` = ?, `categorie_Id` = ?, `ville` = ?, `num_tel` = ? WHERE `id` = ?";

        $stmt = mysqli_prepare($conn, $query);

        if($stmt === false) {
            die("La préparation de la requête a échoué" . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "ssissi", $_nom, $_gender, $_categorieId, $_ville, $_telephone, $_id);

        
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
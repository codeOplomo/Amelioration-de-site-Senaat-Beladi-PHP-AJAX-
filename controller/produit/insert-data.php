<?php
include "connection.php";
if(isset($_POST["submit"])){
    $_produit = $_POST["article"];
    $_desc = $_POST["description"];
    $_artisan = $_POST["artisan"];
    $_categorie = $_POST["categorie"];

    if(empty($_produit) || empty($_desc) || empty($_artisan) || empty($_categorie)){
        header("location: http://localhost/brief4-sanaat-bladi/dashboard.php?message=Champ%20vide");
        exit;
}else{
    $query = "INSERT INTO `produit` (`nom`, `description`, `artisant_Id`, `categorie_Id`) VALUES ('$_produit', '$_desc', '$_artisan', '$_categorie')";

    $result = mysqli_query($conn, $query);
    if(!$result){
        die("La requête a échoué".mysqli_error($conn));
    }else{
        header("location: http://localhost/brief4-sanaat-bladi/dashboard.php?message=Enregistrement%20reussi");
        exit;
    }
}
}
?>
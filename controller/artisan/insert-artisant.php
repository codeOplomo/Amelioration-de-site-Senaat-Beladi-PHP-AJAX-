<?php
include "connection.php";
if(isset($_POST["submitArtisan"])){
    $_artisanName = $_POST["artisan"];
    $_ville = $_POST["ville"];
    $_tel = $_POST["telephone"];
    $_categorie = $_POST["categorie"];
    $_genre = $_POST["gender"];

    if(empty($_artisanName) || empty($_ville) || empty($_tel) || empty($_categorie) || empty($_genre)){
        header("location: http://localhost/brief4-sanaat-bladi/dashboard.php?message=Champ%20vide");
        exit;
}else{
    $query = "INSERT INTO `artisant` (`nom_complet`, `genre`, `categorie_Id`, `ville`, `num_tel`) VALUES ('$_artisanName', '$_genre', '$_categorie', '$_ville', '$_tel')";

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
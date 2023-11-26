<?php
echo"hello1";
include "connection.php";
echo"hello2";
if(isset($_POST["submitArtisan"])){
    echo"hello3";
    $_artisanName = $_POST["artisan"];
    $_ville = $_POST["ville"];
    $_tel = $_POST["telephone"];
    $_categorie = $_POST["categorie"];
    $_genre = $_POST["genre"];

    if(empty($_produit) || empty($_desc) || empty($_artisan) || empty($_categorie) || empty($_genre)){
        header("location:dashboard.php?message= Champ vide");
        exit;
}else{
    echo"hello4";
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
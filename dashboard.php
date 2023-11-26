<?php
include "database/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sanaat bladi dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Preconnect to Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="js/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Tempus Dominus -->
    <link href="js/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Dashboard Styles -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- jQuery (Slim version) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <!-- Popper.js Core -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery (Latest version) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <?php include('sidebar.php');
    function getArtisanNameWithJoin($conn, $artisanId) {
        $query = "SELECT p.*, a.nom_complet as artisan_name FROM produit p
                  JOIN artisant a ON p.artisant_Id = a.id
                  WHERE p.artisant_Id = $artisanId";
        $result = mysqli_query($conn, $query);
    
        if ($result) {
            $artisan = mysqli_fetch_assoc($result);
            return $artisan['artisan_name'];
        } else {
            return "Artisan Not Found";
        }
    }
    function getCategoryNameWithJoin($conn, $categorieId) {
    $query = "SELECT p.*, c.nom as category_name FROM produit p
              JOIN categorie c ON p.categorie_Id = c.id
              WHERE p.categorie_Id = $categorieId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $category = mysqli_fetch_assoc($result);
        return $category['category_name'];
    } else {
        return "Category Not Found";
    }
} 
function getArtisanCategoryNameWithJoin($conn, $categorieId) {
    $query = "SELECT a.*, c.nom as category_name FROM artisant a
              JOIN categorie c ON a.categorie_Id = c.id
              WHERE a.categorie_Id = $categorieId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $category = mysqli_fetch_assoc($result);
        return $category['category_name'];
    } else {
        return "Category Not Found";
    }
}
?>


    <div class="content">
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="dashboard.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-home"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>

            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-envelope me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Message</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="img/user.png" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">User-name send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="img/user.png" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">User-name send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="img/user.png" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">User-name send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item text-center">See all message</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-bell me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Notificatin</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">Profile updated</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">New user added</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">Password changed</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item text-center">See all notifications</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="img/user.png" alt=""
                            style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">User-name</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">My Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <div class="container-fluid pt-4 px-4" id="content-container">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-line fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Today Sale</p>
                            <h5 class="mb-0">$1234</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Sale</p>
                            <h5 class="mb-0">$1234</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-area fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Today Revenue</p>
                            <h5 class="mb-0">$1234</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Revenue</p>
                            <h5 class="mb-0">$1234</h5>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Worldwide Sales</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Salse & Revenue</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Messages</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.png" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">User-name</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.png" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">User-name</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.png" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">User-name</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.png" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">User-name</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">To Do List</h6>
                                <a href="">Show All</a>
                            </div>

                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-2">
                                <input class="form-check-input m-0" type="checkbox">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid pt-4 px-4" id="articles-section">
            <div class="container-fluid pt-4 px-4">
                <div class="h-100 bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Liste des articles</h6>
                        <!-- <a href="">Afficher tout</a> -->
                        <button id="ajout-produit" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>
                            Ajouter</button>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Nom d'article</th>
                                <th scope="col">Description</th>
                                <th scope="col">Artisan</th>
                                <th scope="col">Categorie</th>
                                <th scope="col">Editer</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM produit";
                            $result = mysqli_query($conn, $query);
                            if (!$result) {
                                die("La requête a échoué" . mysqli_error($conn));
                            } else {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <!-- Sample Row -->
                                    <tr>
                                        <td>
                                            <?php echo $row['id'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['nom'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['description'] ?>
                                        </td>
                                        <td>
                                            <?php echo getArtisanNameWithJoin($conn, $row['artisant_Id']); ?>
                                        </td>
                                        <td>
                                            <?php echo getCategoryNameWithJoin($conn, $row['categorie_Id']); ?>
                                        </td>
                                        <!-- Edit Column -->
                                        <td><button class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#exampleModalCenter_<?php echo $row['id']; ?>"><span style="font-size: 1.2em;">&#x270E;
                                        </span></button></td>
                                        <!-- Delete Column -->
                                        <td><button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#deleteExampleModalCenter_<?php echo $row['id']; ?>"><i class="cursor-pointer fa fa-trash"></i></button></td>
                                    </tr>
    <!-- Modal -->
    <form action="database/modify-data.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="modal fade" id="exampleModalCenter_<?php echo $row['id']; ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: black">Editer votre produit
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: grey">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="produitInput">Nom de produit:</label>
                        <input type="text" class="form-control" name="produitModal" id="produitInput" value="<?php echo htmlspecialchars($row['nom']); ?>">
                        <label for="descInput">Description:</label>
                        <input type="text" class="form-control" name="descModal" id="descInput" value="<?php echo htmlspecialchars($row['description']); ?>">
                        <label for="ctgrInput">Categorie:</label>
                        <select class="form-select" aria-label="Default select example" name="ctgrModal" id="ctgrInput">
                        <?php
                        // Fetch categories from the database
                        $categoryQuery = "SELECT * FROM categorie";
                        $categoryResult = mysqli_query($conn, $categoryQuery);

                        if ($categoryResult) {
                            while ($category = mysqli_fetch_assoc($categoryResult)) {
                                echo '<option value="' . $category['id'] . '"';
                                // Check if the current category is selected
                                if ($category['id'] == $row['categorie_Id']) {
                                    echo ' selected';
                                }
                                echo '>' . htmlspecialchars($category['nom']) . '</option>';
                            }
                        }
                        ?>
                        </select>
                        <label for="artisanInput">Artisan:</label>
                        <select class="form-select" aria-label="Default select example" name="artisanModal" id="artisanInput">
                        <?php
                        // Fetch artisans from the database
                        $artisanQuery = "SELECT * FROM artisant";
                        $artisanResult = mysqli_query($conn, $artisanQuery);

                        if ($artisanResult) {
                            while ($artisan = mysqli_fetch_assoc($artisanResult)) {
                                echo '<option value="' . $artisan['id'] . '"';
                                // Check if the current artisan is selected
                                if ($artisan['id'] == $row['artisant_Id']) {
                                    echo ' selected';
                                }
                                echo '>' . htmlspecialchars($artisan['nom_complet']) . '</option>';
                            }
                        }
                        ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="edit-data" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- Modal -->
    <form action="database/delete-data.php" method="post">
    <input type="hidden" name="deleted-id" value="<?php echo $row['id']; ?>">
        <div class="modal fade" id="deleteExampleModalCenter_<?php echo $row['id']; ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: black">Supprimer
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: grey">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center">Vous etes sure de la suppression de ce produit!!</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" name="delete-data" class="btn btn-primary">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
                                    <?php }}?>
                            
                            <form action="database/insert-data.php" method="post">
                                <tr class="form-section container-fluid" style="display: none;">
                                    <td><button type="submit" name="submit" class="btn btn-sm btn-success">
                                            Ajouter <i class="fa fa-plus"></i>
                                        </button></td>
                                    <td>
                                        <input type="text" class="form-control" name="article" id="articleInput"
                                            placeholder="Entrer le nom d'article">
                                        <label class="labell" for="articleInput"></label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="description" id="descriptionInput"
                                            placeholder="Entrer une description">
                                        <label class="labell" for="descriptionInput"></label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="artisan" id="artisanInput"
                                            placeholder="Entrer le nom d'artisan">
                                        <labe class="labell" for="artisanInput"></label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="categorie" id="categorieInput"
                                            placeholder="Entrer la categorie">
                                        <label class="labell" for="categorieInput"></label>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-4 px-4" id="produit-section">


            <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
                <div class="h-100 bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Liste des artisans</h6>
                        <button id="ajout-artisan" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>
                            Ajouter</button>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom complet</th>
                                <th scope="col">Ville</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Categorie</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = "SELECT * FROM artisant";
                            $result = mysqli_query($conn, $query);
                            if (!$result) {
                                die("La requête a échoué" . mysqli_error($conn));
                            } else {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <!-- Sample Row -->
                                    <tr>
                                        <td>
                                            <?php echo $row['id'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['nom_complet'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['ville'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['num_tel'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['genre'] ?>
                                        </td>
                                        <td>
                                            <?php echo getArtisanCategoryNameWithJoin($conn, $row['categorie_Id']); ?>
                                        </td>
                                        <!-- Edit Column -->
                                        <td><button class="btn btn-sm btn-warning" data-toggle="modal"
                                        data-target="#exampleModalCenter_<?php echo $row['id']; ?>"><span style="font-size: 1.2em;">&#x270E;
                                        </span></button></td>
                                        <!-- Delete Column -->
                                        <td><button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#deleteExampleModalCenter_<?php echo $row['id']; ?>"><i class="cursor-pointer fa fa-trash"></i></button></td>
                                    </tr><?php }} ?>

                                    <form action="database/insert-data.php" method="post">
                                <tr class="artisanForm-section container-fluid d-none">
                                    <td><button type="submit" name="submitArtisan" class="btn btn-sm btn-success">
                                            Ajouter <i class="fa fa-plus"></i>
                                        </button></td>
                                    <td>
                                        <input type="text" class="form-control" name="artisan" id="artisanInput"
                                            placeholder="Nom complet">
                                        <label class="labell" for="artisanInput"></label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="ville" id="villeInput"
                                            placeholder="Ville">
                                        <label class="labell" for="villeInput"></label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="telephone" id="telInput"
                                            placeholder="Telephone">
                                        <labe class="labell" for="telInput"></label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="categorie" id="artisanategorieInput"
                                            placeholder="Entrer la categorie">
                                        <label class="labell" for="artisanategorieInput"></label>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="float-left col-sm-12 col-md-6 col-xl-6 mt-4">
                <div class="h-100 bg-light rounded p-4">
                    <!-- Date Pickers -->
                    <div class="mb-4">
                        <label for="startDate" style="color: white;">Date de début:</label>
                        <input type="datetime-local" id="startDate" name="startDate" class="form-control">
                    </div>
                    <div class="mb-4">
                        <label for="endDate" style="color: white;">Date de fin:</label>
                        <input type="datetime-local" id="endDate" name="endDate" class="form-control">
                    </div>

                    <div>
                        <h6>Produits les plus performants</h6>
                        
                    </div>
                </div>
            </div>

            <div class="float-right col-sm-12 col-md-6 col-xl-6 mt-4">
                <div class="h-100 bg-light rounded p-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nom de produit</th>
                                <th scope="col">Profit</th>
                                <th scope="col">Marge</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Short task goes here...</td>
                                <td><input class="form-check-input m-0" type="checkbox"></td>
                                <td><input class="form-check-input m-0" type="checkbox"></td>
                            </tr>

                        </tbody>
                    </table>

                    <!-- Back to Top -->
                    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i
                            class="bi bi-arrow-up"></i></a>
                </div>

            </div>

            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="js/chart.min.js"></script>
            <script src="js/lib/easing/easing.min.js"></script>
            <script src="js/lib/waypoints/waypoints.min.js"></script>
            <script src="js/lib/owlcarousel/owl.carousel.min.js"></script>
            <script src="js/lib/tempusdominus/js/moment.min.js"></script>
            <script src="js/lib/tempusdominus/js/moment-timezone.min.js"></script>
            <script src="js/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

            <script src="js/dashboard.js"></script>
</body>

</html>
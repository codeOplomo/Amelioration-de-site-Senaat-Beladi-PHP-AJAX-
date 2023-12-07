<?php
include "../../config/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/css/bootstrap.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutFLQR3IhP+OcFgFf3b2I1K8xOwqJF1d1/4QUD7qHRg6e9u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- Include page-specific stylesheets if needed -->
  <?php if (isset($pageStyles)) echo $pageStyles; ?>
  
  <title><?php echo $pageTitle; ?></title>
</head>

<body>
  <header>
    <div class="w-lg-75 mx-2 mx-lg-auto position-relative z-2 px-lg-3 py-0 shadow-5 bg-dark">
      <nav class="fixed-top navbar navbar-expand-lg navbar-dark p-0" id="navbar">
        <div class="container px-sm-0">
          <a class="navbar-brand d-inline-block w-lg-64" href="index.html" style="height: 10vh;">
            <div class="d-flex flex-column align-items-center" style="height: 100%;">
              <img style="height: 50%;" src="../../assets/img/logo-senaat.png" alt="">
              <div style="line-height: 1.7vh; font-size: smaller;">Senaat <br>Beladi</div>
            </div>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav gap-3 mx-lg-auto">
              <li class="nav-item ">
                <a class="nav-link rounded-pill" href="index.html" aria-current="page">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link rounded-pill" href="marketplace.html">Marketplace</a>
              </li>
              <li class="nav-item">
                <a class="nav-link rounded-pill" href="Artisan-Anas.html">Artisans</a>
              </li>
              <li class="nav-item">
                <a class="nav-link rounded-pill" href="musee.html">Musee</a>
              </li>
            </ul>
            <div class="navbar-nav align-items-lg-center justify-content-end gap-2 ms-lg-4 w-lg-64">
              <a href="sign-login-Anas.html"
                class="btn btn-sm btn-white nav-link border-0 rounded-pill w-100 w-lg-auto mb-4 mb-lg-0"
                id="lastElementInNavbar">Commencer</a>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
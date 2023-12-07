<?php
$pageTitle = "Login & SignUp";
$pageStyles = '<link rel="stylesheet" href="../../assets/css/sign-login-Anas.css">';
?>
<?php include('../templates/header.php'); ?>
<?php include('../../controller/tablesCrud/selectData.php'); ?>

    


<div class="sign-login-section d-flex container align-items-center">
  <div class="title-area text-center">
    <h1>Entrez vos informations personnelles et commencez votre voyage avec nous</h1>
  </div>
  <div class="form-area sign-section flex-column align-items-center text-center">
    <h1>Sign Up</h1>
    <p>Créez votre compte gratuitement</p>
    <!-- action="../../controller/authentification/sign-login.php" -->
    <form class="sign-form d-flex flex-column align-items-center" method="POST">
      <div class="static-fields d-flex flex-column align-items-start">
        <div class="nameInput">
          <label for="name"></label>
          <input type="text" id="name" name="name" placeholder="Nom*">
          <span class="errmsg">Invalide email!!</span>
        </div>
        <div class="mailinput">
          <label for="sign-email"></label>
          <input type="email" id="sign-email" name="sign-email" placeholder="Email*">
          <span class="errmsg">Invalide email!!</span>
        </div>
        <div class="pswd-input">
          <label for="sign-pswd"></label>
          <input type="password" id="sign-pswd" name="sign-pswd" placeholder="Mot de passe*">
          <span class="errmsg">Invalide password!!</span>
        </div>
        <div class="pswd-input-confirm">
          <label for="confirm-pswd"></label>
          <input type="password" id="confirm-pswd" name="confirm-pswd" placeholder="Répétez votre mot de passe*">
          <span class="errmsg">Invalide password!!</span>
        </div>
        <div class="radio-container">
          <div><b>Type de registration:</b></div>
          <div class="form-check">
            <input class="" type="radio" name="typeUser" id="flexRadioDefault1" value="Client">
            <label class="form-check-label" for="flexRadioDefault1">Client</label>
          </div>
          <div class="form-check">
            <input class="" type="radio" name="typeUser" id="flexRadioDefault2" value="Artisan">
            <label class="form-check-label" for="flexRadioDefault2">Artisan</label>
          </div>
        </div>
      </div>

      <div class="addionalFields">
        <!-- Additional Fields for Client -->
        <div class="client-fields hidden">

          <div class="d-flex flex-column align-items-center ">
            <div class="adressInput">
              <label for="address"></label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Addresse*">
              <span class="errmsg">Invalide password!!</span>
            </div>
            <div class="cityInput">
              <label for="city"></label>
              <select class="form-control" id="city" name="city">
                <option value="" disabled selected>Selecter une ville*</option>

                <?php
                $cityData = fetchData($conn, 'city', 'id, city_name');
                // Generate options based on fetched data
                foreach ($cityData as $city) {
                  echo "<option value='{$city['id']}'>{$city['city_name']}</option>";
                }
                ?>
              </select>
              <span class="errmsg">Invalide password!!</span>
            </div>
            <div class="ageInput">
              <label for="age"></label>
              <input type="text" class="form-control" id="age" name="age" placeholder="Age*">
              <span class="errmsg">Invalide password!!</span>
            </div>
            <div class="phoneInput">
              <label for="phone"></label>
              <input type="tel" class="form-control" id="phone" name="phone" pattern="0[0-9]{2}-[0-9]{3}-[0-9]{4}*"
                placeholder="023-456-7890">
              <span class="errmsg">Invalide password!!</span>
            </div>
          </div>
        </div>

        <!-- Additional Fields for Artisan -->
        <div class="artisan-fields hidden">
          <div class="d-flex flex-column align-items-start ">
            <div class="categoyInput">
              <label for="category"></label>
              <select class="form-control" id="category" name="category">
                <option value="" disabled selected>Selecter une categorie*</option>

                <?php
                $categoryData = fetchData($conn, 'category', 'id, name');
                // Generate options based on fetched data
                foreach ($categoryData as $categori) {
                  echo "<option value='{$categori['id']}'>{$categori['name']}</option>";
                }
                ?>
              </select>
              <span class="errmsg">Invalide password!!</span>
            </div>
            <div class="form-group">
              <label for="experience"></label>
              <input type="text" class="form-control" id="experience" name="experience"
                placeholder="Année d'expérience*">
            </div>
            <div class="form-group">
              <div class="radio-container ">
                <div><b>Genre*:</b></div>
                <div class="form-check">
                  <input class="" type="radio" name="genderUser" id="menGender" value="Homme">
                  <label class="form-check-label" for="menGender">Homme</label>
                </div>
                <div class="form-check">
                  <input class="" type="radio" name="genderUser" id="womenGender" value="Femme">
                  <label class="form-check-label" for="womenGender">Femme</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <input id="signbtn" name="signbtn" type="submit" value="Sign Up">
    </form>
    <p>Vous avez deja un compte?? <b id="link-login">Login</b></p>
  </div>

  <div class="form-area login-section flex-column align-items-center text-center">
    <h1>Login</h1>
    <h4>Bienvenue</h4>
    <p id="loginTitle">Pour rester en contact avec nous, veuillez vous connecter avec vos informations personnelles</p>
    <form action="../../controller/authentification/sign-login.php" id="loginForm" class="login-form d-flex flex-column align-items-center" method="POST">

      <div class="mailinput">
        <label for="sign-email"></label>
        <input type="email" id="log-email" name="sign-email" placeholder="Email">
        <span class="errmsg">Invalide email!!</span>
      </div>
      <div class="pswd-input">
        <label for="sign-pswd"></label>
        <input type="password" id="log-pswd" name="sign-pswd" placeholder="Mot de pasee">
        <span class="errmsg">Invalide password!!</span>
      </div>

      <input id="loginbtn" name="loginbtn" type="submit" value="Login">
    </form>
    <p>Vous n'avez pas un compte?? <b id="link-sign">Sign up</b></p>
  </div>

</div>


<?php include('../templates/footer.php'); ?>
<?php
include("../tablesCrud/insertion.php");
include("../tablesCrud/selectData.php");

session_start();

function isValidPhoneNumber($phone)
{
    return preg_match('/^\d{3}-\d{3}-\d{4}$/', $phone);
}

function isValidAge($age)
{
    return is_numeric($age) && intval($age) > 0;
}
function isValidYearExp($yearExp)
{
    return is_numeric($yearExp) && intval($yearExp) > 0 && intval($yearExp) < 40;
}

function isValidAddress($address)
{
    return strlen($address) > 0;
}

function validateClientData($phone, $age, $address)
{
    $errors = [];

    if (!isValidPhoneNumber($phone)) {
        $errors[] = 'Invalid phone number';
    }

    if (!isValidAge($age)) {
        $errors[] = 'Invalid age';
    }

    if (!isValidAddress($address)) {
        $errors[] = 'Invalid address';
    }

    return $errors;
}

function validateArtisanData($phone, $age, $address, $yearExp)
{
    $errors = validateClientData($phone, $age, $address); // Reuse validation for common fields

    if (!isValidYearExp($yearExp)) {
        $errors[] = 'Invalid years of experience';
    }

    return $errors;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signbtn'])) {


    if (!empty($_POST['name']) && !empty($_POST['sign-email']) && !empty($_POST['sign-pswd'])) {

        /* name vami */

        $password = $_POST['sign-pswd'];
        $confirmPassword = $_POST['confirm-pswd'];

        $existingEmail = fetchData($conn, 'user', 'email', "email = '{$_POST['sign-email']}'");
        if (!empty($existingEmail)) {
            die("Email already exists. Please choose a different email.");
        }
        if (strlen($_POST['name']) > 30) {
            die("Nom invalide!!. Max 30.");
        }

        if ($password !== $confirmPassword) {
            die("Les mots de passe ne correspondent pas.");
        } else {

            $userData = [
                'name' => htmlspecialchars($_POST['name']),
                'email' => filter_var($_POST['sign-email'], FILTER_VALIDATE_EMAIL),
                'password' => password_hash($_POST['sign-pswd'], PASSWORD_DEFAULT),
                'registrationDate' => date('Y-m-d H:i:s'),
            ];

            $typeUser = isset($_POST['typeUser']) ? $_POST['typeUser'] : 'none';
            if ($typeUser === 'Client' || $typeUser === 'Artisan') {
                if (!empty($_POST['address']) && !empty($_POST['age']) && !empty($_POST['phone'])) {
                    $selectedCityID = isset($_POST['city']) ? $_POST['city'] : null;

                    // Validate client or artisan data
                    $errors = ($typeUser === 'Client')
                        ? validateClientData($_POST['phone'], $_POST['age'], $_POST['address'])
                        : validateArtisanData($_POST['phone'], $_POST['age'], $_POST['address'], $_POST['experience']);

                    if (!empty($errors)) {
                        foreach ($errors as $error) {
                            echo $error . "<br>";
                        }
                    } else {
                        // Set common fields for both Client and Artisan
                        $userData += [
                            'adress' => htmlspecialchars($_POST['address']),
                            'villeId' => $selectedCityID,
                            'age' => htmlspecialchars($_POST['age']),
                            'telephone' => htmlspecialchars($_POST['phone']),
                            'roleId' => ($typeUser === 'Client') ? 2 : 3,
                        ];
                        // Insert common user data
                        // $userId = insertIntoTable($conn, 'user', $userData);
                        insertIntoTable($conn, 'user', $userData);
                        $users = fetchData($conn, 'user', 'id', $condition = "email = '{$userData['email']}'");
                        $userId = (!empty($users) && isset($users[0]['id'])) ? $users[0]['id'] : null;


                        if ($userId) {
                            
                        // Additional data for Artisan
                        if ($typeUser === 'Artisan') {
                            $selectedGender = isset($_POST['genderUser']) ? $_POST['genderUser'] : null;
                            $selectedCategoryID = isset($_POST['category']) ? $_POST['category'] : null;
                            $artisanData = [
                                'categoryId' => $selectedCategoryID,
                                'yearExperience' => htmlspecialchars($_POST['experience']),
                                'genre' => $selectedGender,
                                'userId' => $userId,
                            ];
                            insertIntoTable($conn, 'artisan', $artisanData);
                        }
                        }

                        // Set session variable and redirect
                        // $_SESSION[$typeUser . '_signup_success'] = true;
                        header('Location: ../../view/authentification/sign-login-Anas.php#loginForm');
                        exit();
                    }
                }
            } else {
                die("Invalid user type.");
            }
        }
    }
}
?>
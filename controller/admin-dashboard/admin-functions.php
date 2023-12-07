<?php 

function getArtisanNameWithJoin($conn, $artisanId)
{
    $query = "SELECT u.name AS user_name
              FROM product p
              INNER JOIN artisan a ON p.artisanId = a.id
              INNER JOIN user u ON a.userId = u.id
              WHERE p.artisanId = ?";

    // Use prepared statement
    $stmt = mysqli_prepare($conn, $query);

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        return getErrorAlert("Error preparing statement: " . mysqli_error($conn));
    }

    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "i", $artisanId);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if the result is not empty
    if ($result) {
        $productData = mysqli_fetch_assoc($result);

        // Check if $productData is not null before accessing array offset
        if ($productData !== null && isset($productData['user_name'])) {
            return $productData['user_name'];
        } else {
            return getErrorAlert("User Name Not Found");
        }
    } else {
        return getErrorAlert("User Not Found: " . mysqli_error($conn));
    }
}

    
    function getCategoryNameWithJoin($conn, $categorieId) {
    $query = "SELECT p.*, c.name as category_name FROM product p
              JOIN category c ON p.categoryId = c.id
              WHERE p.categoryId = $categorieId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $category = mysqli_fetch_assoc($result);
        return $category['category_name'];
    } else {
        return getErrorAlert("Error preparing statement: " . mysqli_error($conn));
    }
} 
function getArtisanCategoryNameWithJoin($conn, $categorieId) {
    $query = "SELECT a.*, c.name as category_name FROM artisan a
              JOIN category c ON a.categoryId = c.id
              WHERE a.categoryId = ?";

              // Use prepared statement
    $stmt = mysqli_prepare($conn, $query);

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        return getErrorAlert("Error preparing statement: " . mysqli_error($conn));
    }

    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "i", $categoryId);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        $category = mysqli_fetch_assoc($result);
        return $category['category_name'];
    } else {
        return getErrorAlert("Category Not Found: " . mysqli_error($conn));
    }
}
function getErrorAlert($message)
{
    return '<div class="alert alert-danger" role="alert">' . $message . '</div>';
}
?>
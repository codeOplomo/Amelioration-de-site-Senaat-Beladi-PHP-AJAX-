<?php
include "../config/connection.php";

// Start the session
session_start();

// Check if the user is logged in and has the 'artisan' role
if (!isset$_SESSION['role_id'] != 2) {
    // Redirect to the login page if the user is not an artisan
    header('Location: login.php');
    exit();
}

// Artisan's user ID
$artisanUserId = $_SESSION['user_id'];

// Fetch products related to the logged-in artisan
// Pseudo-code: You will need to replace this with the actual query
$products = []; // Assume this will be filled with product data from the database

// Handling form submissions for adding, updating, and deleting products
// Pseudo-code for handling form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_product'])) {
        // Add product logic
    } elseif (isset($_POST['edit_product'])) {
        // Edit product logic
    } elseif (isset($_POST['delete_product'])) {
        // Delete product logic
    }
    // After handling form submission, redirect back to the Artisansdashboard.php to see changes
    header('Location: Artisansdashboard.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Artisan Dashboard</title>
    <!-- Include all the same head elements from your provided dashboard.php -->
    <!-- ... -->
</head>

<body>
    <?php include('templates/sidebar.php'); ?>

    <!-- Artisan-specific dashboard content -->
    <div class="container-fluid pt-4 px-4">
        <!-- Artisan Product Management Table -->
        <div class="row">
            <div class="col-12">
                <h2>My Products</h2>
                <!-- Button trigger modal for adding new product -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
                    Add New Product
                </button>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- PHP code to list products -->
                        <?php foreach ($products as $product) { ?>
                            <tr>
                                <td><?php echo $product['id']; ?></td>
                                <td><?php echo $product['name']; ?></td>
                                <td><?php echo $product['price']; ?></td>
                                <td><?php echo $product['description']; ?></td>
                                <td>
                                    <!-- Edit and delete buttons -->
                                    <button class="btn btn-warning">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Product Modal -->
    <!-- ... -->
    <!-- Replace with actual HTML for modal and form -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="../assets/js/chart.min.js"></script>
            <script src="../assets/js/lib/easing/easing.min.js"></script>
            <script src="../assets/js/lib/waypoints/waypoints.min.js"></script>
            <script src="../assets/js/lib/owlcarousel/owl.carousel.min.js"></script>
            <script src="../assets/js/lib/tempusdominus/js/moment.min.js"></script>
            <script src="../assets/js/lib/tempusdominus/js/moment-timezone.min.js"></script>
            <script src="../assets/js/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

            <script src="../assets/js/dashboard.js"></script>
</body>

</html>
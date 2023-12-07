<?php 
include("../../config/connection.php");
function fetchData($conn, $tableName, $columns = '*', $condition = '')
{
    // Build the query
    $query = "SELECT $columns FROM $tableName";

    // Add a condition if provided
    if (!empty($condition)) {
        $query .= " WHERE $condition";
    }

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $query);

    // Check if the preparation of the statement failed
    if ($stmt === false) {
        die("La préparation de la requête a échoué" . mysqli_error($conn));
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    // Fetch data
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Free the result set
    mysqli_stmt_close($stmt);

    return $data;
}
?>
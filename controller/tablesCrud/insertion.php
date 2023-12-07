<?php

include("../../config/connection.php");
function insertIntoTable($conn, $tableName, $data)
{
    // Ensure data is not empty
    if (empty($data)) {
        die("No data provided for insertion.");
    }

    // Prepare placeholders and values
    $columns = implode(',', array_keys($data));
    $placeholders = implode(',', array_fill(0, count($data), '?'));

    // Build the query
    $query = "INSERT INTO $tableName ($columns) VALUES ($placeholders)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt === false) {
        die("La préparation de la requête a échoué" . mysqli_error($conn));
    }

    // Determine types and bind parameters dynamically
    $types = '';
    $params = [];

    foreach ($data as $key => $value) {
        if (is_int($value)) {
            $types .= 'i';
        } elseif (is_float($value)) {
            $types .= 'd';
        } else {
            $types .= 's'; // Assume string for other types
        }

        $params[] = &$data[$key];
    }

    array_unshift($params, $stmt, $types); // Add stmt and types at the beginning
    call_user_func_array('mysqli_stmt_bind_param', $params);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);
    // Get the last inserted ID
    $lastInsertedID = mysqli_insert_id($conn);

    if (!$result) {
        die("La requête a échoué" . mysqli_error($conn));
    }


    // Close the statement
    mysqli_stmt_close($stmt);

    // Return the last inserted ID
    return $lastInsertedID;
}
?>
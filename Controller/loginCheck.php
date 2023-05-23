<?php
// Include the database connection code
require_once 'db.php';
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user's email and password from the form
    $db = new dbConnect();
    
    // Execute the query
    $result = $db->select("Admins", "*","Email = '" . $_POST['email'] . "' AND Password = '" . $_POST['password'] . "'");

    // Check if the user exists
    if ($result->num_rows > 0) {
        // User exists, fetch the user data
        $user = $result->fetch_assoc();
        $response = array('status' => 'success', 'Email' => $user['Email'], 'Name' => $user['Name']);
       

    } else {
        // User does not exist
       
        $response = array('status' => 'error', 'message' => 'Invalid email or password.');

    }
    header('Content-Type: application/json');
echo json_encode($response);
exit();
}
else{
    //redirect to prevoius page
    header("Location: ../View/Admin/login.php");
}
?>
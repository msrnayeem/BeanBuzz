<?php
// Include the database connection code
require_once 'db.php';
require_once '../Model/Admin.php';
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user's details from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];

    // Validate the input
    $errors = [];

    // Validate name
    if (strlen($name) < 6) {
        $errors['name'] = "Name should be at least 6 characters long.";
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }


    // Validate password
    if (strlen($password) < 6) {
        $errors['password'] = "Password should be at least 6 characters long.";
    }

    // Validate dob
    // ...

    // Validate phone
    if (!preg_match("/^01[0-9]{9}$/", $phone)) {
        $errors['phone'] = "Phone should be 11-digit starting with 01.";
    }

    // Check if there are any validation errors
    if (!empty($errors)) {
        // redirect to the registration page
        session_start();
        $_SESSION['errors'] = $errors;
        header("Location: ../View/Admin/adminReg.php");
        exit();
    } else {
        // Create a new instance of the Admin model
        $admin = new Admin();
        $admin->Name = $name;
        $admin->Email = $email;
        $admin->Password = $password;
        $admin->DOB = $dob;
        $admin->Phone = $phone;

        // Insert the admin data into the database
        $db = new dbConnect();
        $success = $db->insert("Admins", $admin);

        if ($success) {
            echo "Admin data inserted successfully";
            //redirect to login page
            header("Location: ../View/Admin/login.php");
        } else {
            echo "Failed to insert admin data";
        }
    }
}
else{
    //redirect to prevoius page
    header("Location: ../View/Admin/adminReg.php");
}

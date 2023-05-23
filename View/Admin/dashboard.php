<?php
session_start();

// Retrieve session variables
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  // Use the email value as needed
  echo $email;
  echo "<br>";
}
else{
    echo "not set<br>";
}

if (isset($_SESSION['name'])) {
  $name = $_SESSION['name'];
  // Use the name value as needed

    echo $name;
}
else{
    echo "not set";
}
?>

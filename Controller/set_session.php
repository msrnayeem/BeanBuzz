<?php
session_start();

if (isset($_POST['email']) && isset($_POST['name'])) {
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['name'] = $_POST['name'];
}
?>
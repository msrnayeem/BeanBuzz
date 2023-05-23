<!DOCTYPE html>
<html>
<head>
    <title><?php echo $pageTitle; ?></title>
    <!-- Include your CSS stylesheets and other meta tags here -->
    <link rel="stylesheet" type="text/css" href="../../css/header.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $cssFilePath; ?>">
    <!-- Additional stylesheets or meta tags -->
</head>
<body>
<header class="header">
        <nav>
            <ul class="nav-items">
                <li><a href="../Admin/dashboard.php" <?php if (isset($currentPage) && $currentPage === 'dashboard') echo 'class="active"'; ?>>Home</a></li>
                <li><a href="profile.php" <?php if (isset($currentPage) && $currentPage === 'profile') echo 'class="active"'; ?>>Profile</a></li>
                <li><a href="about.php" <?php if (isset($currentPage) && $currentPage === 'about') echo 'class="active"'; ?>>About</a></li>
                <li><a href="contact.php" <?php if (isset($currentPage) && $currentPage === 'contact') echo 'class="active"'; ?>>Contact</a></li>
                <li><a href="contact.php" <?php if (isset($currentPage) && $currentPage === 'logout') echo 'class="active"'; ?>>Logout</a></li>
                <!-- Add more navigation links as needed -->
            </ul>
        </nav>
    </header>
    <!-- Add more content of your web page below -->

<?php
// Start the session and retrieve the errors
session_start();
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
unset($_SESSION['errors']);
?>
  
<!DOCTYPE html>
<html>
<head>
    <title>Admin Registration</title>
    <link rel="stylesheet" type="text/css" href="../../Css/login.css">
    <link rel="icon" href="../../Assets/bean.ico" type="image/x-icon">
</head>
<body>
<div class="container">
    <h2>Registration Form</h2>
    <hr>
    <br/>
    <form action="../../Controller/adminRegCheck.php" method="post" autocomplete="off">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" >
        <?php if (isset($errors['name'])): ?>
        <span class="error"><?php echo $errors['name']; ?></span>
        <?php endif; ?>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" >
        <?php if (isset($errors['email'])): ?>
        <span class="error"><?php echo $errors['email']; ?></span>
        <?php endif; ?>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" >
        <?php if (isset($errors['password'])): ?>
        <span class="error"><?php echo $errors['password']; ?></span>
        <?php endif; ?>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>
        

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" >
        <?php if (isset($errors['phone'])): ?>
        <span class="error"><?php echo $errors['phone']; ?></span>
        <?php endif; ?>

        <br/>
        <div class="buttonContainer">
            <button type="submit">Submit</button>
            <button class="backButton" type="button" onclick="goBack()">Back</button>
        </div>
   
    </form>
  </div>
  <script>
    function goBack() {
        window.history.back();
    }
</script>
</body>
</html>

<!DOCTYPE html>
<html>

<head>
    <title>Login to BeanBuzz</title>
    <link rel="stylesheet" type="text/css" href="../Css/login.css">
    <link rel="icon" href="../Assets/bean.ico" type="image/x-icon">
</head>

<body>
<div class="container">
    <h1>Login</h1>
    <hr>
    <div id="error" class="error"></div>

    <form id="loginForm" method="POST" autocomplete="off">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <div class="form-options">
            <label for="rememberMe">
                <input type="checkbox" id="rememberMe" name="rememberMe">
                Remember me
            </label>
            <a href="#">Forgot password?</a>
            <br>
        </div>

        <button type="submit">Login</button>
        <br>
        <br>
    </form>

    <div class="signup">
        Don't have an account? <a href="#">Sign up</a>
    </div>
</div>

<script src="../Scripts/login.js"></script>

    
</body>


</html>
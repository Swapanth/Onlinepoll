<!DOCTYPE html>
<html>
<head>
    <title>Student Poll System</title>
</head>
<body>
    <h1>Welcome to the Student Poll System</h1>

    <!-- Registration Form -->
    <h2>Registration</h2>
    <form action="register.php" method="post">
        <input type="text" name="roll_number" placeholder="Roll Number" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Register">
    </form>

    <!-- Login Form -->
    <h2>Login</h2>
    <form action="login.php" method="post">
        <input type="text" name="roll_number" placeholder="Roll Number" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>

    <!-- Teacher Panel and Teacher Login Button -->
    <h2>Teacher Panel</h2>
    <a href="teacherlogin.php">
        <button>Teacher Panel</button>
    </a>

    <!-- Button to Attend the Poll -->
    <h2>SEE THE RESULTS</h2>
    <a href="poll.php">
        <button>result</button>
    </a>
</body>
</html>

<?php

include('partials/database.php');

$message = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    $sql = "INSERT INTO users (name, lname, email, username, password) 
        VALUES ('$name', '$lname', '$email', '$username', '$password')";

    try {
        $mysqli->query($sql);
        $message = "Account Registerd!";
        header("Location: login.php");
    } catch (mysqli_sql_exception) {
        $message = "Account already existed!";
    }

    $mysqli->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<?php
    include('partials/head.php');
?>

<body>

    <?php include("partials/header.php"); ?>

    <div class="container undernav">
        <div class="form-container">
            <h2>Sign Up</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <input type="text" placeholder="Name" name="name" required>
                <input type="text" placeholder="Last Name" name="lname" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="text" placeholder="Username" name="username" required>
                <input type="password" placeholder="Password" name="password" required>
                <input type="submit" value="Register" class="btn">
            </form>
            <span><?php echo $message; ?></span>
        </div>
    </div>
</body>

</html>
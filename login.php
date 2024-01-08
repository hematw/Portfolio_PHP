<?php

include('partials/database.php');

?>

<!DOCTYPE html>
<html lang="en">

<?php
        include('partials/head.php');
        ?>

<body>
<?php 
    include("partials/header.php"); 
    $loginErr = null;

if (isset($_POST["submit"])) {
    // Sanitize and retrieve the form data
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $mysqli->real_escape_string($_POST['password']);

    // Query to retrieve user record based on the provided username
    $query = "SELECT password FROM users WHERE username = '$username'";
    $result = $mysqli->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            $query = "SELECT * FROM users WHERE username = '$username'";
            $result = $mysqli->query($query);
            $row = $result->fetch_assoc();


            $_SESSION["username"] = $row["username"];
            $_SESSION["name"] = ucfirst($row["name"]);
            $_SESSION["lname"] = ucfirst($row["lname"]);
            $_SESSION["id"] = $row["id"];

            echo $row["id"];
            
            header("Location: index.php");
        } else {
            // Password is incorrect
            $loginErr = "Incorrect password try again.😬";
        }
    } else {
        // No user record found for the provided username
        $loginErr = "There is no user with provided info.🤔";
    }

    $result->free();
    }

$mysqli->close();
?>
    <div class="container undernav">
        <div class="form-container">
            <h2>Login</h2>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <input type="text" placeholder="Username" name="username" required>
                <input type="password" placeholder="Password" name="password" required>
                <input type="submit" value="Login" name="submit" class="btn">
            </form>
            <span><?php  echo $loginErr; ?></span>
        </div>
    </div>
</body>

</html>

<?php 

?>
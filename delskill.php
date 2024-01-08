<!DOCTYPE html>
<html lang="en">

<?php
include("partials/head.php")
?>

<body>
<section class="undernav">
        <div class="container">
            <div class="full">
                <div class="form-container">
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                        <p>Are you sure to Remove?</p>
                        <input type="text" name="id" value="<?php echo $_GET["id"]; ?>">
                        <input type="submit" name="remove" value="Remove" class="btn">
                        <a href="index.php" class="btn">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<?php 

if($_POST["remove"]) {
    $id = $_POST["id"];

    if($mysqli){
        $sql = "DELETE FROM skills WHERE skill_id = $id";

        if($mysqli->query($sql)) {
            header("Location: index.php");
        } else {
            echo "Error Ocured";
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<?php
include("partials/head.php");
$id = $_GET["id"];
$skill = $skill_desc = "";

$sql = "SELECT * FROM skills WHERE skill_id = $id";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$skill = $row["skill"];
$skill_desc = $row["skill_desc"];
?>

<body>
<section class="undernav">
        <div class="container">
            <div class="full">
                <div class="form-container">
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                        <p>Write new changes</p>
                        <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                        <input type="text" name="skill" value="<?php echo $skill; ?>">
                        <input type="text" name="skill_desc" value="<?php echo $skill_desc; ?>">
                        <input type="submit" name="update" value="Update" class="btn">
                        <a href="index.php" class="btn">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<?php 

if($_POST["update"]) {
    $id = $_POST["id"];
    $skill = $_POST["skill"];
    $skill_desc = $_POST["skill_desc"];
    if($mysqli){
        $sql = "UPDATE skills SET skill = '$skill', skill_desc = '$skill_desc' WHERE skill_id = '$id'";

        if($mysqli->query($sql)) {
            echo "HHHHHHHHHHHHHHHHHHH";
            header("Location: index.php");
        } else {
            echo "Error Ocured";
        }
    }
}



?>
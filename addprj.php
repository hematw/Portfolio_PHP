<!DOCTYPE html>
<html lang="en">

<?php
include("partials/head.php")
?>

<body>
    <div class="full container">
        <div class="form-container">
            <h2 class="sec-title">Add new Project</h2>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <input type="text" placeholder="Project Name" name="prj" required>
                <input type="text" placeholder="Project Description" name="prj_desc" required>
                <input type="submit" name="addprj" value="Add to Skills" class="btn">
                <a href="index.php" class="btn">Cancel</a>
            </form>
        </div>
    </div>
</body>

</html>

<?php
// THIS CODE IS FOR ADDING PROJECTS

if (isset($_POST['addprj'])) {
    $id = $_SESSION['id'];

    $prj = filter_input(INPUT_POST, 'prj', FILTER_SANITIZE_SPECIAL_CHARS);
    $prj_desc = filter_input(INPUT_POST, 'prj_desc', FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "INSERT INTO projects (user_id, prj, prj_desc) 
                        VALUES ($id, '$prj', '$prj_desc')";

    $mysqli->query($sql);
    header("Location: index.php");
}
?>
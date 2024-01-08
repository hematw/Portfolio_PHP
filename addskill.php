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
                    <h2 class="sec-title">Add new skill</h2>
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                        <input type="text" placeholder="Skill Name" name="skill" required>
                        <input type="text" placeholder="Skill Description" name="skill_desc" required>
                        <input type="submit" name="addskill" value="Add to Skills" class="btn">
                        <a href="index.php" class="btn">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>


</html>

<?php
// THIS CODE IS FOR ADDING SKILLS
if (isset($_POST['addskill'])) {
    // Process the form submission
    $id = $_SESSION['id'];
    $skill = filter_input(INPUT_POST, 'skill', FILTER_SANITIZE_SPECIAL_CHARS);
    $skill_desc = filter_input(INPUT_POST, 'skill_desc', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "INSERT INTO skills (user_id, skill, skill_desc) 
                        VALUES ($id, '$skill', '$skill_desc')";
    $mysqli->query($sql);

    header("Location: index.php");
}
?>
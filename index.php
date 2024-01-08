<!DOCTYPE html>
<html lang="en">
<?php

include('partials/head.php');


?>

<body>



    <?php

    include("partials/header.php");

    $fullname = $_SESSION['name'] . " " . $_SESSION['lname'];
    $id = $_SESSION['id'] = 1;

    ?>

    <section class="home undernav">
        <div class="home-containt container">
            <div class="text">
                <h3>Hi! I am</h3>
                <h2 class="sec-title"><?php echo $fullname; ?></h2>
                <p>We are passionate team of programmers with expertise in various programming languages and frameworks.</p>
            </div>
            <div class="profile">
                <img src="img/profile.png" alt="profile">
                <a href="update_pic.php?id=<?php echo $id ?>">Update Profile</a>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="container">
            <h2 class="sec-title">About Me</h2>
            <p>We have several years of experience in software development and have worked on a variety of projects, ranging from web applications to mobile apps. My passion for coding and problem-solving drives me to continuously learn and stay up-to-date with the latest technologies and best practices.</p>
            <p>We are skilled in languages such as JavaScript, Python, and Java, and have experience with frameworks like React, Django, and Spring. I have a strong understanding of database management systems, version control, and software testing.</p>
        </div>
    </section>

    <section id="skills">
        <div class="container">
            <h2 class="sec-title">Skills</h2>
            <div class="skills-container">
                <?php
                if (isset($_SESSION["username"])) {
                    $query = "SELECT * FROM skills WHERE user_id = '$id'";
                    $result = $mysqli->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                        <div class='skill-item'>
                            <h3>{$row['skill']}</h3>
                            <p>{$row['skill_desc']}</p>
                            <a href='updskill.php?id={$row['skill_id']}' class='btn'>🖋</a>
                            <a href='delskill.php?id={$row['skill_id']}' class='btn'>🗑</a>
                        </div>
                        ";
                        }
                    } else {
                        echo "You did not added any skill.";
                    }
                }
                ?>
            </div>
        </div>
        <?php
        if (!isset($_SESSION["username"])) {
        echo
        '<a href="addskill.php" class="btn">Add Skill</a>';
        }
        ?>
    </section>

    <section id="projects">
        <div class="container">
            <h2 class="sec-title">Projects</h2>
            <div class="projects-container">
                <?php
                if (isset($_SESSION["username"])) {
                    $query = "SELECT * FROM projects WHERE user_id = '$id'";
                    $result = $mysqli->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                        <div class='project-item'>
                            <h3>{$row['prj']}</h3>
                            <p>{$row['prj_desc']}</p>
                        </div>
                        ";
                        }
                    } else {
                        echo "You did not added any Project.";
                    }
                }
                ?>
            </div>
        </div>
        <?php
        if (!isset($_SESSION["username"])) {
        echo
        '<a href="addprj.php" class="btn">Add Project</a>';
        }
        ?>
    </section>
    <section id='contact'>
        <div class='container'>
            <h3>We hear from you</h3>

            <form class='contact-form' action='index.php' method='post'>
                <input type="text" name="fullname" placeholder="Your Fullname">
                <input type="email" name="email" placeholder="Your Email">
                <textarea placeholder='Message' name='message' class='message-box'></textarea>
                <input type='submit' name='send' value='Send Message' class='btn'>
            </form>
        </div>
    </section>
    <?php
    include('partials/database.php');


    // THIS CODE IS FOR RECIEVING MESSAGE FROM CONTACT SECTION
    if (isset($_POST['send'])) {
        $name = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

        $sql = "INSERT INTO messages (fullname, email, message) 
                    VALUES ('$name', '$email', '$message')";

        $mysqli->query($sql);
        header("Location: success.php");
        exit();
    }

    ?>



    <footer>
        <div class="container">
            <p>&copy; 2023 HyperBros. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
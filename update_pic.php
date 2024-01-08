<!DOCTYPE html>
<html lang="en">
<?php
// include("partials/head.php");
if (isset($_POST["save"])) {
    $target = "./img/";
    $filename = $_FILES["profile"]["name"];
    $targetFile = $target . $filename;
    echo $filename;

    $file_extentions_array = array("jpg", "jpeg", "png");
    $upfile_ext = explode(".", $filename);
    $ext = end($upfile_ext);

    
    $message = "";
    if(in_array($ext, $file_extentions_array)){
        move_uploaded_file($_FILES["profile"]["tmp_name"], $targetFile);
        $message = "file uploaded successfully";
    } else {
        $message = "not uploaded";
    }
}

?>
</html>

<body>
    <section class="undernav">
        <div class="container">
            <div class="full">
                <div class="form-container">
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
                        <p>choose new photo</p>
                        <!-- <input type="hidden" name="id" value="<?php //echo $_GET["id"]; ?>"> -->
                        <input type="file" name="profile">
                        <input type="submit" name="save" value="upload" class="btn">
                        <a href="index.php" class="btn">Cancel</a>
                        <p><?php echo $message ?></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

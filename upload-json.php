<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload-json</title>
</head>
<body>
    <?php
    if (isset($_SESSION['error'])){

    foreach($_SESSION['error']as $error){
    echo "$error .<br>";
    }
    unset($_SESSION['error']);
    }
?>
    <form action="handle-upload-json.php" method="POST" enctype="multipart/form-data">
    <input name="fileName" type="text">
    <br>
    <input type="file" name="file">
    <br>
    <input type="submit" value="upload" name="submit">
    
    
    </form>
</body>
</html>
<?php
session_start();

if (isset($_SESSION['success'])){
    echo $_SESSION['success'];
}

$assocContent = $_SESSION['assocContent'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>
<body>
    
    <ul>
    <?php foreach($assocContent['programmingLanguage'] as $language){?>
    <li><b>Name :</b> <?php echo  " $language[name] "?></li><br>
    <li><b>Description :</b> <?php echo  " $language[description]"?></li><br>
    <li><b>Created_by :</b> <?php echo  " $language[created_by] "?></li><br>
    <li><b>Created_at :</b> <?php echo  " $language[created_at] "?></li>


<?php }?>

    </ul>
</body>
</html>


   


<?php 
unset($_SESSION['success']);
unset($_SESSION['assocContent']);

?>

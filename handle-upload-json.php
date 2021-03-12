<?php
session_start();
if (isset($_POST['submit'])){

    $name = $_POST['fileName'];
    $file= $_FILES['file'];

    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];
    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
    $error=[];

    // validation
    // fileName
    if(empty($name)){
        $error[]='file name is required';
    }
    else if((! is_string($name)) or (is_numeric($name))){
        $error[] ='file name must be string';
    }
//  FileError
if($fileError != 0){
    $error[]='Erorr occured while uploading file';
}
// file exetension
elseif(!in_array($extension,['json'])){
   $error[]='file must be json'; 
}

// if not have any errors
if(empty($error)){
    $fileNewName = uniqid() . "." . $extension;
    move_uploaded_file($fileTmpName, "files/$fileNewName");

    
    $_SESSION['success'];
    header("location:display.php");
       
$fileRead=file_get_contents("programming.json");
$assocContent=json_decode($fileRead,true);
echo "<pre>";

foreach($assocContent['programmingLanguage'] as $language){

    echo  " $language[name] <br>";

}
// print_r($assocContent);
 $_SESSION['assocContent']=$assocContent;


}
else
{
    // display errors in user.php
    $_SESSION['error']= $error;
    header("location:upload-json.php");
}













    

}
//   print_r($assocContent); 

// $fileData=fopen("programming.json", "r");
// $fileDataSize="programming.json";
// $fileRead =fread($fileData, $fileDataSize) ;
// fclose($fileData);



// print_r($error);
// print_r($file);
?>
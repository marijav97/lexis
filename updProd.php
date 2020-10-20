<?php
include "connection.php";
if(isset($_POST['btnProd'])){

    $name = $_POST['title'];
    $desc= $_POST['desc'];
    $idUp = $_POST['idUp']; 

    $imageFile =$_FILES['image'];
    $imageName=$imageFile['name'];
    $typeFile=$imageFile['type'];
    $sizeFile=$imageFile['size'];
    $tmp_name=$imageFile['tmp_name'];

    $error=[];

    $reTitle="/^([A-Za-z]{2,30})(\s[A-Za-z]{2,30}){1,}$/";
    $reDesc="/^([A-Za-z]{2,14}(\s[A-Za-z]{2,14}){1,})$/"; 
        $error = [];

      if(!preg_match($reTitle, $name)){
          $error[] = "Title is not in good format.";
      }

      if(!preg_match($reDesc, $desc)){
          $error[] = "Desc is not in good format.";
          echo "wrong";
      }

  $okay=array("image/jpg","image/jpeg","image/png");

  if(!in_array($typeFile, $okay)){
    $error[] = "Type is not good!";
    } 
    if($sizeFile > 3000000){
      $error[] = "File must be less than 3MB";
      } 
      if(count($error)>0){
          $status=422;
      } else {
      
    $nameFile = time().$imageName; 
    $pathFile = "images/".$nameFile; 
    if(move_uploaded_file($tmp_name, $pathFile)){ 
      $upitReg = "UPDATE work SET name=:name, description=:description, image=:path WHERE idWork=:idUp"; 

    $rezultat_1 = $conn->prepare($upitReg);
    $rezultat_1->bindParam(':name', $name);
    $rezultat_1->bindParam(':description', $desc);
    $rezultat_1->bindParam(':path', $pathFile);
    $rezultat_1->bindParam(":idUp", $idUp); 

          
      $res= $rezultat_1->execute();
      if ($res){
        header("Location:admin.php");
      }
      else {
        echo("Something is wrong");
     }
    }
}
}
?>
<?php 
session_start();

if(isset($_POST['sendLogin'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
}
$rePass="/^[a-z]{4,16}[\d]+$/"; 
$error=[];
if(!preg_match($rePass,$password)){ 
    $error[] = "Something is wrong."; 
} 
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){          
    $error[]="Something is wrong.";    
}
if(count($error) > 0){
    $error[]="Something is wrong!";
} else {
    require_once("connection.php");
    $password=md5($password);
    $upit= "SELECT u.*, r.roleName FROM users u INNER JOIN role r ON u.idRole=r.idRole WHERE u.email=:email AND u.password=:password";
    $prepare=$conn->prepare($upit);
    $prepare->bindParam(":email",$email);
    $prepare->bindParam(":password",$password);
    $prepare->execute();
    $result=$prepare->fetch();
    if($result){
        $_SESSION['user']=$result;
        header("Location: index.php");
    } else {
        $_SESSION['greske']="Something is wrooong!";
        header("Location:index/php");
    }
}

?>

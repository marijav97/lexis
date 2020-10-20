<?php
session_start(); 
require_once("connection.php");       
$status=404;
if(isset($_POST['sendReg'])){
    $firstName=$_POST['firstName'];         
    $lastName=$_POST['lastName'];        
    $username=$_POST['usernameReg'];        
    $email=$_POST['emailReg'];         
    $password=$_POST['passwordReg'];         
 
 
     $error=[];                
     $reFirstName="/^[A-Z][a-z]{2,11}$/";
     $relastName="/^([A-Z][a-z]{2,15})+$/"; 
     $repass="/^\w{2,}\d*$/";         
     $reuser="/^[A-Za-z]{2,}\d*$/"; 

    if(!preg_match($reFirstName, $firstName)){
        array_push($error, "First name is not in a good format!"); 
    }
    if(!preg_match($relastName, $lastName)){             
        array_push($error, "Last name is not in a good format!");
    }
    if(!preg_match($repass, $password)){             
        array_push($error, "Password is not in a good format!");
    } 
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){          
        array_push($error, "Email is not in a good format!"); 
    } 
    if(count($error)>0){
        $status=422;
        echo "Something is wrong, you have to try again!";
    } else {
    $query = "INSERT INTO users (firstName,lastName,username,email,password, idRole) 
    VALUES ('$firstName','$lastName','$username','$email','$password',2)";  
    $insert=$conn->query($query);    
    if($insert){      
        echo "Well done!";  
        header("Location:user.php");
    }   
    else{     
        echo "Try again!";
    }  
}
}
?>  
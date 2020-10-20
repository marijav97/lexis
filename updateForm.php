<?php
    session_start();

    include "connection.php";
    $status=404;
    $mess=null;

    if(isset($_SESSION['user'])){
        if($_SESSION['user']->idRole != 1){

            $_SESSION['error'] ="You are not admin!";

            header("Location: index.php");
        }
    } else {
        $_SESSION['error'] ="Login first!!";
        header("Location: index.php");
    }
    if(isset($_POST['btnUsers'])) {  
        $id=$_POST['id'];     
        $firstName =$_POST['firstName'];     
        $lastName = $_POST['lastName'];     
        $email =$_POST['email'];     
        $password =$_POST['password']; 
        $role=$_POST['role']; 
        $error=[];   

		$reFirstName="/^[A-Z][a-z]{2,11}$/";
        $relastName="/^([A-Z][a-z]{2,15})+$/"; 
        $reuser="/^\w{2,}\d*$/"; 
		$error = [];

		if(!preg_match($reFirstName, $firstName)){
			$error[] = "First name is not in good format.";
		}

		if(!preg_match($relastName, $lastName)){
			$error[] = "Last Name is not in good format.";
        }

		if($role == "0"){
			$error[] = "Choose role, please.";
		}

		if(count($error)==0){    
        $query = "UPDATE users SET firstName=:firstName,lastName=:lastName,email=:email,password=:password, idRole=:role WHERE idUser=:id";     
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":firstName",$firstName);   
        $stmt->bindParam(":lastName",$lastName);   
        $stmt->bindParam(":email",$email);   
        $stmt->bindParam(":password",$password);  
        $stmt->bindParam(":role",$role);
        $stmt->bindParam(":id",$id);        
        try{
        $rez=$stmt->execute(); 
 
        if($rez){     
            header("Location:admin.php"); 
        }    else {        
            echo "Something is wrong";    
        }   
       }
       catch(PDOException $e){
           echo "neeeee";
       }
    }
}
?>

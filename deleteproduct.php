<?php
    session_start();
    include "connection.php";
    
    if(isset($_SESSION['user'])){
        if($_SESSION['user']->idRole != 1){

            $_SESSION['error'] ="You are not admin!";

            header("Location: index.php");
        }
    } else {
        $_SESSION['error'] ="Login first!!";
        header("Location: index.php");
    }
    if(!isset($_GET['id'])){
        echo "Wrong.";
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM work WHERE idWork= :id";
        $result = $conn->prepare($query);
    
        $result->bindParam(":id", $id);
    
        $result->execute();
        header("Location: admin.php");
    }
?>
<?php
    session_start();
    include "connection.php";
    $code=404;
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
        echo "Ne valja";
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $code=404;
        $upit = "DELETE FROM users WHERE idUser = :id";
        $rezultat = $conn->prepare($upit);
        $rezultat->bindParam(":id", $id);
        try {
        $rez=$rezultat->execute();
            if($rez) {
                $code=204;
                header("Location:admin.php");
            } else {
                $code=500;
            }
        } catch(PDOException $e){
            $code=409;
        } 
        http_response_code($code);
    }
?>
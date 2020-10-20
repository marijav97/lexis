<?php
    $server='localhost';     
    $username='root';     
    $password='';    
    $dbName='webdesign';     
    try{         
        $conn=new PDO("mysql:host=$server;dbname=$dbName;charset=utf8",$username,$password);  
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);   
    }     
    catch(PDOException $e)    
    {         
        echo "Error, connection failed:".$e->getMessage();   
    } 
?>
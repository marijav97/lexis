<?php

if(isset($_POST['btnUsers'])){

    $id = $_POST['id'];

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    include "connection.php";

    $upit = "UPDATE users SET firstName= :firstName, lastName = :lastName, email = :email, password = :password, idRole =:role WHERE id = :id";

    $result = $conn->prepare($upit);

    $result->bindParam(":id", $id);

    $result->bindParam(":firstName", $firstName);
    $result->bindParam(":lastName", $lastName);
    $result->bindParam(":email", $email);
    $result->bindParam(":password", $password);
    $result->bindParam(":role", $role);

    $resultt->execute();
    header("Location: admin.php");
}
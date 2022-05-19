<?php

require "config.php";

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($name && $email) {

    $sql = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() === 0) {

        $sql = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $sql->bindvalue(':name', $name);
        $sql->bindValue(':email',$email);
        $sql->execute();
    }

    header("Location: index.php");
    exit;

} else {
    header("Location: add-user.php");
    exit;

}


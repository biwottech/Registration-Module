<?php
include_once("Connections/connections.php");

if (isset($_POST['register'])) {
    $mail = $_POST['mail'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $insert = $db->prepare("INSERT INTO tbl_users(Mail, Password) VALUES(:mail, :password)");
    $results = $insert->execute(array(":mail" => $mail, ":password" => $password));

    if ($results) {
        echo json_encode("Successfull registration ");
    } else {
        echo json_encode("Error in registration ");
    }
}

if (isset($_POST['validate'])) {
    $mail = $_POST['mail'];

    $query_rsUser = $db->prepare("SELECT * FROM tbl_users WHERE Mail=:mail");
    $query_rsUser->execute(array(":mail" => $mail));
    $row_rsUser = $query_rsUser->fetch();
    $total_rsUser = $query_rsUser->rowCount();

    if ($total_rsUser > 0) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}

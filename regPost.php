<?php

require_once "bootstrap.php";
$msg = "";
$_SESSION["msg"] = "Заполните поля";
$_SESSION["alert"] = "alert-warning";
session_start();

require_once "Connection.php";
$_SESSION["name"] = trim(filter_var($_POST["name"] ?? "", FILTER_SANITIZE_STRING));
$_SESSION["login"] = trim(filter_var($_POST["login"] ?? "", FILTER_SANITIZE_STRING));
$_SESSION["pass"] = trim(filter_var($_POST["pass"] ?? "", FILTER_SANITIZE_STRING));
$_SESSION["passGo"] = trim(filter_var($_POST["passGo"] ?? "", FILTER_SANITIZE_STRING));

$_SESSION["auth"] = false;

$error = [];

if (isset($_POST["goReg"])) {
    $res = $dataPost->Auth($_POST);
    echo $res->name;
    if (strlen($_SESSION["name"]) < 2) {
        $error[] = "Имя слишком короткое ";
        $_SESSION["alert"] = "alert-danger";

    }

    if ($res != null) {
        $_SESSION["alert"] = "alert-danger";
        $error[] = "Пользователь с таким логином уже существует\n";

    }

    if ($_SESSION["pass"] != $_SESSION["passGo"]) {
        $error[] = "Пароли не совпадают ";
        $_SESSION["alert"] = "alert-danger";

    }

    if (strlen($_SESSION["pass"]) < 3) {
        $error[] = "Пароль короткий ";
        $_SESSION["alert"] = "alert-danger";

    }


    if (count($error) == 0) {
        $_SESSION["auth"] = true;
        $_SESSION["msg"] = "Все данные верны, запись добавлена ";
        $_SESSION["alert"] = "alert-success";
    } else {
        $_SESSION["msg"] = implode("\n", $error);
        $_SESSION["auth"] = false;
    }

}

if (!$_SESSION["auth"]) {

    header("Location:index.php");
} else {
    $we = $dataPost->insertUser($_POST);
    header("Location: /");
}
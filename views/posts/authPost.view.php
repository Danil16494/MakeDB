<?php
session_start();
$title="Регистрация пользователя";
require_once __DIR__."/../parts/header.php";
?>
    <div class="container col-md-5 col-offset-3">
    <hr>
    <div class="alert <?= $_SESSION["alert"] ?>" role="alert">
        <?= nl2br($_SESSION["msg"]) ?>
    </div>
    <hr>
    <form action="action.php" method="post">
        <div class="form-group">


            <label for="login">Введите email:</label>
            <input type="email" class="form-control"
                   id="login" name="login" autofocus >
            <br> <label for="pass">Введите пароль:</label>
            <input type="password" class="form-control"
                   id="pass" name="pass" autofocus  ><br>
            <button type="submit" class="btn btn-primary" name="goAuth">Авторизоваться</button>
        </div>
    </form>
<?php require_once __DIR__."/../parts/footer.php"?>
<?php
require_once "Connection.php";
require_once "PostData.php";
require_once "UserData.php";
$config=require_once "config.php";
$newPost=new PostData(Connection::make($config));
$dataPost=new UserData(Connection::make($config));